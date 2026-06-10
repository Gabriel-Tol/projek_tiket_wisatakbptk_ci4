<?= $this->extend('visitor/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="panel panel-blue panel-widget ">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-tags glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalTiket ?></div>
                    <div class="text-muted">Total Tiket</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-check glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalBerhasil ?></div>
                    <div class="text-muted">Pemesanan Berhasil</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="panel panel-orange panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-plus glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <a href="<?= base_url('destinasi') ?>" style="text-decoration: none;">
                        <div class="large">Pesan</div>
                        <div class="text-muted">Tiket Baru</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Aktivitas Terakhir</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Destinasi</th>
                                <th>Tgl Kunjungan</th>
                                <th>Status</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recentHistory)) : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada riwayat pemesanan.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($recentHistory as $row) : ?>
                                    <tr>
                                        <td><strong><?= $row['no_transaksi'] ?></strong></td>
                                        <td><?= $row['nama_destinasi'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($row['tanggal_kunjungan'])) ?></td>
                                        <td>
                                            <?php $lbl = ($row['status'] === 'Berhasil') ? 'label-success' : (($row['status'] === 'Menunggu Konfirmasi') ? 'label-warning' : 'label-default'); ?>
                                            <span class="label <?= $lbl ?>"><?= strtoupper($row['status']) ?></span>
                                        </td>
                                        <td class="text-right">
                                            <a href="<?= base_url('booking/success/' . $row['no_transaksi']) ?>" class="btn btn-primary btn-xs">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="<?= base_url('user/riwayat') ?>">Lihat Semua Riwayat &rarr;</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Profil Saya</div>
            <div class="panel-body text-center">
                <div style="margin-bottom: 15px;">
                    <?php if ($user['foto']) : ?>
                        <img src="<?= base_url('uploads/profile/' . $user['foto']) ?>" class="img-circle" width="100" height="100" style="object-fit: cover; border: 3px solid #eee;">
                    <?php else : ?>
                        <div class="img-circle mx-auto" style="width: 100px; height: 100px; background: #f9f9f9; line-height: 100px; margin: 0 auto; border: 1px solid #ddd;">
                            <span class="glyphicon glyphicon-user" style="font-size: 50px; color: #ccc; vertical-align: middle;"></span>
                        </div>
                    <?php endif; ?>
                </div>
                <h4><?= $user['nama_pengunjung'] ?></h4>
                <p class="text-muted"><?= $user['email'] ?></p>
                <hr>
                <div class="text-left" style="font-size: 13px;">
                    <p><strong>ALAMAT:</strong><br><?= $user['alamat'] ?: '-' ?></p>
                    <p><strong>NO. HP:</strong><br><?= $user['no_hp'] ?: '-' ?></p>
                </div>
                <a href="<?= base_url('user/profile') ?>" class="btn btn-default btn-block">Edit Profil</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
