<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Laporan Pemesanan</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan Pemesanan Tiket</h1>
        </div>
    </div>

    <!-- Filter Tanggal -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Filter Laporan</div>
                <div class="panel-body">
                    <form class="form-inline" action="<?= base_url('admin/filter-laporan'); ?>" method="post">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tgl_awal" class="form-control" 
                                   value="<?= $tgl_awal ?? ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" class="form-control" 
                                   value="<?= $tgl_akhir ?? ''; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-filter"></span> Tampilkan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Hasil -->
    <?php if (!empty($dataLaporan)) : ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <span>Hasil Laporan (<?= $tgl_awal; ?> s/d <?= $tgl_akhir; ?>)</span>
                    <a href="#" onclick="window.print()" class="btn btn-success btn-sm pull-right">
                        <span class="glyphicon glyphicon-print"></span> Cetak
                    </a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Pengunjung</th>
                                <th>Tanggal</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; $totalKeseluruhan = 0; ?>
                            <?php foreach ($dataLaporan as $trx) : ?>
                                <?php $totalKeseluruhan += $trx['total_bayar']; ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $trx['no_transaksi']; ?></td>
                                    <td><?= $trx['nama_pengunjung']; ?></td>
                                    <td><?= $trx['tgl_transaksi']; ?></td>
                                    <td class="text-right">Rp <?= number_format($trx['total_bayar'], 0, ',', '.'); ?></td>
                                    <td><?= $trx['status']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-right">Total Keseluruhan</th>
                                <th class="text-right">Rp <?= number_format($totalKeseluruhan, 0, ',', '.'); ?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?= $this->include('Backend/Template/footer'); ?>