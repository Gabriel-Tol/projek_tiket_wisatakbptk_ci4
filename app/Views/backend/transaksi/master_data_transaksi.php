<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Transaksi</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Transaksi</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                    </a>
                    <a href="<?= base_url('admin/transaksi-step1'); ?>" class="btn btn-primary pull-right">
                        <span class="glyphicon glyphicon-plus"></span> Transaksi Baru
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:130px;">No Transaksi</th>
                                <th>Pengunjung</th>
                                <th style="width:120px;" class="text-center">Tanggal</th>
                                <th style="width:140px;" class="text-right">Total Bayar</th>
                                <th style="width:160px;" class="text-center">Status</th>
                                <th style="width:80px;" class="text-center">QR Code</th>
                                <th style="width:130px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataTransaksi as $trx) : ?>
                                <tr>
                                    <td><code><?= $trx['no_transaksi']; ?></code></td>
                                    <td><?= $trx['nama_pengunjung']; ?></td>
                                    <td class="text-center"><?= $trx['tgl_transaksi']; ?></td>
                                    <td class="text-right">Rp <?= number_format($trx['total_bayar'], 0, ',', '.'); ?></td>
                                    <td class="text-center">
                                        <?php $status = $trx['status']; ?>
                                        <?php if ($status === 'Berhasil' || $status === 'Sukses') : ?>
                                            <span class="label label-success"><?= $status; ?></span>
                                        <?php elseif ($status === 'Menunggu Konfirmasi' || $status === 'Pending') : ?>
                                            <span class="label label-warning"><?= $status; ?></span>
                                        <?php elseif ($status === 'Batal') : ?>
                                            <span class="label label-danger"><?= $status; ?></span>
                                        <?php else : ?>
                                            <span class="label label-default"><?= $status; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($trx['qr_code']) : ?>
                                            <img src="/<?= $trx['qr_code']; ?>" width="50" height="50" class="img-thumbnail">
                                        <?php else : ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($trx['status'] === 'Menunggu Konfirmasi') : ?>
                                            <a href="<?= base_url('admin/konfirmasi-transaksi/' . $trx['no_transaksi']); ?>" 
                                               class="btn btn-success btn-sm" style="color: white;" title="Konfirmasi"
                                               onclick="return confirm('Konfirmasi transaksi <?= $trx['no_transaksi']; ?>?')">
                                                <span class="glyphicon glyphicon-ok"></span> Konfirmasi
                                            </a>
                                        <?php else : ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/Template/footer'); ?>