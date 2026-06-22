<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

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
                <div class="panel-heading clearfix">
                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                    </a>
                    <span style="margin-left: 10px; font-weight: bold;">Filter Laporan</span>
                </div>
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
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th data-width="60" class="text-center">No</th>
                                <th data-width="150">No Transaksi</th>
                                <th>Pengunjung</th>
                                <th data-width="120" class="text-center">Tanggal</th>
                                <th data-width="150" class="text-right">Total Bayar</th>
                                <th data-width="160" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; $totalKeseluruhan = 0; ?>
                            <?php foreach ($dataLaporan as $trx) : ?>
                                <?php $totalKeseluruhan += $trx['total_bayar']; ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <th colspan="4" class="text-right" style="font-weight:600;">Total Keseluruhan</th>
                                <th class="text-right" style="font-weight:600;">Rp <?= number_format($totalKeseluruhan, 0, ',', '.'); ?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?= $this->include('backend/Template/footer'); ?>