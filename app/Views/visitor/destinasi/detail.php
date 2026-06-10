<?= $this->extend('visitor/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default" style="overflow: hidden;">
            <img src="<?= base_url('Assets/foto_destinasi/' . $destinasi['foto']) ?>" style="width: 100%; max-height: 400px; object-fit: cover;" alt="<?= $destinasi['nama_destinasi'] ?>">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <span class="label label-primary"><?= $kategori['nama_kategori'] ?></span>
                        <h2 style="margin-top: 10px; font-weight: bold;"><?= $destinasi['nama_destinasi'] ?></h2>
                        <p class="text-muted" style="font-size: 16px;"><span class="glyphicon glyphicon-map-marker" style="color: #f9243f;"></span> <?= $destinasi['lokasi'] ?></p>
                        <hr>
                        <h4 style="font-weight: bold; margin-bottom: 15px;">Deskripsi Wisata</h4>
                        <p style="line-height: 1.8; color: #666;"><?= nl2br($destinasi['deskripsi']) ?></p>
                        
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-6">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <span class="glyphicon glyphicon-time" style="font-size: 30px; color: #30a5ff;"></span>
                                        </div>
                                        <div class="col-xs-9">
                                            <p class="text-muted small" style="margin-bottom: 0;">Jam Operasional</p>
                                            <p><strong>08:00 - 17:00 WIB</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <span class="glyphicon glyphicon-ok-sign" style="font-size: 30px; color: #8ad919;"></span>
                                        </div>
                                        <div class="col-xs-9">
                                            <p class="text-muted small" style="margin-bottom: 0;">Fasilitas</p>
                                            <p><strong>Parkir, Toilet, Gazebo</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Pesan Tiket</div>
            <div class="panel-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-12">
                        <p class="text-muted">Harga Tiket / Orang</p>
                        <h2 style="margin: 0; color: #30a5ff; font-weight: bold;">Rp <?= number_format($destinasi['harga_tiket'], 0, ',', '.') ?></h2>
                    </div>
                </div>
                
                <div class="alert bg-info">
                    <span class="glyphicon glyphicon-info-sign"></span> Tiket dapat dipesan untuk kunjungan kapan saja sesuai jadwal operasional.
                </div>

                <hr>

                <?php if (session()->get('is_login')) : ?>
                    <a href="<?= base_url('booking/form/' . $destinasi['id_destinasi']) ?>" class="btn btn-primary btn-lg btn-block">
                        Pesan Sekarang <span class="glyphicon glyphicon-arrow-right"></span>
                    </a>
                <?php else : ?>
                    <a href="<?= base_url('auth/login') ?>" class="btn btn-default btn-lg btn-block">
                        Login untuk Memesan
                    </a>
                    <p class="text-center small" style="margin-top: 15px;">Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar Sekarang</a></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-2">
                        <span class="glyphicon glyphicon-shield" style="font-size: 25px; color: #8ad919;"></span>
                    </div>
                    <div class="col-xs-10">
                        <h5 style="margin-top: 0; font-weight: bold;">Transaksi Aman</h5>
                        <p class="small text-muted" style="margin-bottom: 0;">Semua transaksi dienkripsi dan diproses secara real-time.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
