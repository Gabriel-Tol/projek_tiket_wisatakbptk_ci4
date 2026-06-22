<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

<!-- Breadcrumb -->
<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Dashboard</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-8">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <div class="col-lg-4 text-right" style="padding-top:20px;">
        <a href="<?= base_url('admin/input-destinasi'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Destinasi</a>
        <a href="<?= base_url('admin/master-availability'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-calendar"></i> Ketersediaan</a>
        <a href="<?= base_url('admin/master-transaksi'); ?>" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Transaksi</a>
    </div>
</div><!--/.row-->

<!-- Panel Statistik -->
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-th-list glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalKategori ?? 0; ?></div>
                    <div class="text-muted">Kategori</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-orange panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-picture glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalDestinasi ?? 0; ?></div>
                    <div class="text-muted">Destinasi</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalTransaksi ?? 0; ?></div>
                    <div class="text-muted">Transaksi</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-user glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalPengunjung ?? 0; ?></div>
                    <div class="text-muted">Pengunjung</div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Grafik Transaksi 7 Hari Terakhir</div>
            <div class="panel-body">
                <div style="height:240px;">
                <canvas id="transaksi-line-chart" style="width:100%;height:100%;display:block;"></canvas>
            </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Peringatan Ketersediaan</div>
            <div class="panel-body">
                <?php if (!empty($lowAvailability)) : ?>
                    <?php foreach ($lowAvailability as $la) : ?>
                        <?php $used = (int)$la['booked']; $cap = (int)$la['capacity']; $remaining = max(0, $cap - $used);
                              $percent = $cap > 0 ? round(($used / $cap) * 100) : 0; ?>
                        <div style="margin-bottom:12px;">
                            <strong><?= $la['nama_destinasi'] ?? $la['destinasi_kode']; ?></strong>
                            <div class="text-muted" style="font-size:12px;"><?= date('d M Y', strtotime($la['date'])) ?> — Sisa: <?= $remaining ?> tiket</div>
                            <div class="progress" style="height:8px;margin-top:6px;">
                                <div class="progress-bar progress-bar-<?= ($percent >= 80) ? 'danger' : (($percent >= 50) ? 'warning' : 'success') ?>" role="progressbar" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent ?>%;"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="text-right"><a href="<?= base_url('admin/master-availability'); ?>">Lihat semua &rarr;</a></div>
                <?php else : ?>
                    <p class="text-muted">Semua tanggal terlihat sehat.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><!--/.row-->

<script>
    window.addEventListener('load', function() {
        var ctx = document.getElementById('transaksi-line-chart');
        if (!ctx || !window.Chart) {
            return;
        }

        var transaksiChart = {
            labels: <?= json_encode($grafikLabels, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>,
            datasets: [{
                label: 'Transaksi',
                fillColor: 'rgba(48, 164, 255, 0.2)',
                strokeColor: 'rgba(48, 164, 255, 1)',
                pointColor: 'rgba(48, 164, 255, 1)',
                pointStrokeColor: '#fff',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(48, 164, 255, 1)',
                data: <?= json_encode($grafikData, JSON_NUMERIC_CHECK); ?>
            }]
        };

        var chartInstance = ctx.getContext('2d');
        new Chart(chartInstance).Line(transaksiChart, {
            responsive: true,
                    maintainAspectRatio: false,
                    scaleBeginAtZero: true,
                    pointDotRadius: 5,
                    bezierCurve: false,
                    layout: { padding: { left: 10, right: 10, top: 10, bottom: 10 } },
                });
    });
</script>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Transaksi Terbaru</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Pengunjung</th>
                                <th>Destinasi</th>
                                <th>Tgl</th>
                                <th class="text-right">Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recentTransaksi)) : ?>
                                <?php foreach ($recentTransaksi as $rt) : ?>
                                    <tr>
                                        <td><strong><?= $rt['no_transaksi'] ?></strong></td>
                                        <td><?= $rt['nama_pengunjung'] ?? '-' ?></td>
                                        <td><?= $rt['nama_destinasi'] ?? '-' ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($rt['tgl_transaksi'])) ?></td>
                                        <td class="text-right">Rp <?= number_format($rt['total_bayar'] ?? 0, 0, ',', '.') ?></td>
                                        <td><span class="label <?= ($rt['status'] === 'Berhasil') ? 'label-success' : 'label-warning' ?>"><?= $rt['status'] ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr><td colspan="6" class="text-center text-muted">Belum ada transaksi</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/Template/footer'); ?>