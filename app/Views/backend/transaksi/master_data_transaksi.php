<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

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
                <div class="panel-heading">
                    <a href="<?= base_url('admin/transaksi-step1'); ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Transaksi Baru
                    </a>
                </div>
                <div class="panel-body">
                    <table data-toggle="table" 
                           data-search="true" 
                           data-pagination="true" 
                           data-page-size="10"
                           data-loading-template=""
                           class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Pengunjung</th>
                                <th>Tanggal</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>QR Code</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataTransaksi as $trx) : ?>
                                <tr>
                                    <td><?= $trx['no_transaksi']; ?></td>
                                    <td><?= $trx['nama_pengunjung']; ?></td>
                                    <td><?= $trx['tgl_transaksi']; ?></td>
                                    <td>Rp <?= number_format($trx['total_bayar'], 0, ',', '.'); ?></td>
                                    <td>
                                        <?php $status = $trx['status']; ?>
                                        <?php if ($status === 'Berhasil' || $status === 'Sukses') : ?>
                                            <span class="label label-success"><?= $status; ?></span>
                                        <?php elseif ($status === 'Menunggu Konfirmasi' || $status === 'Pending') : ?>
                                            <span class="label label-warning"><?= $status; ?></span>
                                        <?php elseif ($status === 'Batal') : ?>
                                            <span class="label label-danger"><?= $status; ?></span>
                                        <?php else : ?>
                                            <?= $status; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($trx['qr_code']) : ?>
                                            <img src="/<?= $trx['qr_code']; ?>" width="50">
                                        <?php else : ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($trx['status'] === 'Menunggu Konfirmasi') : ?>
                                            <a href="<?= base_url('admin/konfirmasi-transaksi/' . $trx['no_transaksi']); ?>" class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi transaksi <?= $trx['no_transaksi']; ?>?')">
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

<?= $this->include('Backend/Template/footer'); ?>