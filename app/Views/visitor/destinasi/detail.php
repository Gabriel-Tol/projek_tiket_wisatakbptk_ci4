<?= $this->extend('visitor/layout') ?>

<?= $this->section('content') ?>

<!-- Back Button -->
<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12">
        <a href="<?= base_url('user/dashboard'); ?>" class="btn btn-default">
            <span class="glyphicon glyphicon-arrow-left"></span> Kembali ke Dashboard
        </a>
    </div>
</div>

<div class="row">
    <!-- Kolom Kiri - Gambar & Deskripsi -->
    <div class="col-md-8">
        <!-- Gambar Utama -->
        <div class="panel panel-default" style="overflow: hidden; border: none; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <?php 
            $images = [
                'DST002' => 'Assets/Pasir_Panjang_Beach,_Singkawang_City.jpg',
                'DST003' => 'Assets/tugu katulistiwa.jpg',
                'DST004' => 'Assets/danau sentarum.jpg',
                'DST005' => 'Assets/bukit kelam.jpg',
                'DST006' => 'Assets/pulau lemukutan.png',
                'DST007' => 'Assets/Keraton Kadariah.jpg',
            ];
            $imgPath = $images[$destinasi['id_destinasi']] ?? 'Assets/foto_destinasi/' . $destinasi['foto'];
            ?>
            <img src="<?= base_url($imgPath) ?>" style="width: 100%; height: 400px; object-fit: cover;" alt="<?= $destinasi['nama_destinasi'] ?>">
        </div>

        <!-- Info Destinasi -->
        <div class="panel panel-default" style="border: none; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <div class="panel-body" style="padding: 25px;">
                <!-- Kategori & Judul -->
                <div style="margin-bottom: 20px;">
                    <span class="label label-primary" style="font-size: 12px; padding: 5px 12px; border-radius: 20px;"><?= $kategori['nama_kategori'] ?? 'Wisata' ?></span>
                    <h2 style="margin-top: 12px; font-weight: bold; color: #333;"><?= $destinasi['nama_destinasi'] ?></h2>
                    <p style="margin: 0; color: #777; font-size: 15px;">
                        <span class="glyphicon glyphicon-map-marker" style="color: #f9243f; margin-right: 5px;"></span> <?= $destinasi['lokasi'] ?>
                    </p>
                </div>

                <hr style="border-color: #eee; margin: 20px 0;">

                <!-- Deskripsi -->
                <div style="margin-bottom: 25px;">
                    <h4 style="font-weight: bold; color: #333; margin-bottom: 15px;">
                        <span class="glyphicon glyphicon-info-sign" style="color: #30a5ff; margin-right: 8px;"></span>Deskripsi Wisata
                    </h4>
                    <p style="line-height: 1.9; color: #555; font-size: 15px; text-align: justify;">
                        <?= nl2br($destinasi['deskripsi']) ?>
                    </p>
                </div>

                <hr style="border-color: #eee; margin: 20px 0;">

                <!-- Fasilitas & Jam Operasional -->
                <div class="row">
                    <div class="col-md-6">
                        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 15px;">
                            <div style="display: flex; align-items: center; margin-bottom: 12px;">
                                <span class="glyphicon glyphicon-time" style="font-size: 24px; color: #30a5ff; margin-right: 12px;"></span>
                                <div>
                                    <p style="margin: 0; color: #777; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Jam Operasional</p>
                                    <p style="margin: 0; font-weight: bold; color: #333;">08:00 - 17:00 WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 15px;">
                            <div style="display: flex; align-items: center; margin-bottom: 12px;">
                                <span class="glyphicon glyphicon-ok-sign" style="font-size: 24px; color: #198754; margin-right: 12px;"></span>
                                <div>
                                    <p style="margin: 0; color: #777; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Fasilitas</p>
                                    <p style="margin: 0; font-weight: bold; color: #333;">Parkir, Toilet, Gazebo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lokasi di Map -->
                <div style="margin-top: 15px;">
                    <h4 style="font-weight: bold; color: #333; margin-bottom: 15px;">
                        <span class="glyphicon glyphicon-road" style="color: #f9243f; margin-right: 8px;"></span>Lokasi
                    </h4>
                    <div style="background: #f8f9fa; padding: 15px; border-radius: 8px;">
                        <p style="margin: 0 0 10px 0; color: #555;">
                            <span class="glyphicon glyphicon-map-marker" style="color: #f9243f; margin-right: 5px;"></span>
                            <?= $destinasi['lokasi'] ?>
                        </p>
                        <div class="ratio ratio-16x9" style="border-radius: 8px; overflow: hidden;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127672.09457861873!2d109.35!3d0.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1f2f2f2f2f2f2f%3A0x0!2sKalimantan+Barat!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                                    style="border: 0; border-radius: 8px;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan - Panel Pemesanan -->
    <div class="col-md-4">
        <!-- Panel Harga & Pesan -->
        <div class="panel" style="border: none; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden;">
            <div style="background: linear-gradient(135deg, #30a5ff 0%, #1a73e8 100%); padding: 20px; color: white;">
                <h4 style="margin: 0; font-weight: bold;">Pesan Tiket</h4>
            </div>
            <div class="panel-body" style="padding: 25px;">
                <!-- Harga -->
                <div style="text-align: center; margin-bottom: 20px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                    <p style="margin: 0 0 5px 0; color: #777; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;">Harga Tiket / Orang</p>
                    <h2 style="margin: 0; color: #30a5ff; font-weight: bold;">Rp <?= number_format($destinasi['harga_tiket'], 0, ',', '.') ?></h2>
                </div>

                <!-- Stok -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding: 12px 15px; background: #e8f5e9; border-radius: 8px;">
                    <span style="color: #555;">
                        <span class="glyphicon glyphicon-ok" style="color: #198754; margin-right: 5px;"></span> Stok Tersedia
                    </span>
                    <strong style="color: #198754;"><?= $destinasi['stok_tiket'] ?> Tiket</strong>
                </div>

                <!-- Info -->
                <div style="padding: 12px 15px; background: #fff3cd; border-radius: 8px; margin-bottom: 20px;">
                    <span class="glyphicon glyphicon-info-sign" style="color: #856404; margin-right: 5px;"></span>
                    <small style="color: #856404;">Tiket dapat dipesan untuk kunjungan kapan saja sesuai jadwal operasional.</small>
                </div>

                <!-- Tombol Aksi -->
                <?php if (session()->get('is_login')) : ?>
                    <a href="<?= base_url('booking/form/' . $destinasi['id_destinasi']) ?>" class="btn btn-primary btn-lg btn-block" style="padding: 15px; border-radius: 8px; font-weight: bold; background: linear-gradient(135deg, #30a5ff 0%, #1a73e8 100%); border: none;">
                        <span class="glyphicon glyphicon-shopping-cart" style="margin-right: 8px;"></span> Pesan Sekarang
                    </a>
                <?php else : ?>
                    <a href="<?= base_url('auth/login') ?>" class="btn btn-default btn-lg btn-block" style="padding: 15px; border-radius: 8px; font-weight: bold;">
                        <span class="glyphicon glyphicon-lock" style="margin-right: 8px;"></span> Login untuk Memesan
                    </a>
                    <p class="text-center" style="margin-top: 15px; color: #777;">
                        Belum punya akun? <a href="<?= base_url('auth/register') ?>" style="font-weight: bold;">Daftar Sekarang</a>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Panel Keamanan -->
        <div class="panel" style="border: none; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-top: 20px;">
            <div class="panel-body" style="padding: 20px;">
                <div style="display: flex; align-items: flex-start;">
                    <div style="background: #e8f5e9; padding: 12px; border-radius: 50%; margin-right: 15px;">
                        <span class="glyphicon glyphicon-shield" style="font-size: 22px; color: #198754;"></span>
                    </div>
                    <div>
                        <h5 style="margin: 0 0 5px 0; font-weight: bold; color: #333;">Transaksi Aman</h5>
                        <p style="margin: 0; font-size: 13px; color: #777;">Semua transaksi dienkripsi dan diproses secara real-time.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Info Cepat -->
        <div class="panel" style="border: none; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-top: 20px;">
            <div class="panel-body" style="padding: 20px;">
                <h5 style="margin: 0 0 15px 0; font-weight: bold; color: #333;">
                    <span class="glyphicon glyphicon-question-sign" style="color: #30a5ff; margin-right: 5px;"></span> Info Cepat
                </h5>
                <div style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 10px;">
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #777;">Kategori</span>
                        <strong style="color: #333;"><?= $kategori['nama_kategori'] ?? '-' ?></strong>
                    </div>
                </div>
                <div style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 10px;">
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #777;">Lokasi</span>
                        <strong style="color: #333; text-align: right; max-width: 60%;"><?= explode(',', $destinasi['lokasi'])[0] ?></strong>
                    </div>
                </div>
                <div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #777;">Jam Buka</span>
                        <strong style="color: #333;">08:00 - 17:00</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Responsive adjustments */
@media (max-width: 768px) {
    .panel-body h2 {
        font-size: 22px;
    }
    
    .panel-body h4 {
        font-size: 16px;
    }
}

/* Dark mode adjustments */
[data-theme="dark"] .panel-default .panel-body h2,
[data-theme="dark"] .panel-default .panel-body h4,
[data-theme="dark"] .panel-default .panel-body h5,
[data-theme="dark"] .panel-default .panel-body strong {
    color: #e6edf3 !important;
}

[data-theme="dark"] .panel-default .panel-body p {
    color: #c9d1d9 !important;
}

[data-theme="dark"] .panel-default .panel-body hr {
    border-color: #30363d !important;
}

[data-theme="dark"] .panel-default .panel-body [style*="background: #f8f9fa"],
[data-theme="dark"] .panel-default .panel-body [style*="background:#f8f9fa"] {
    background-color: #21262d !important;
}

[data-theme="dark"] .panel-default .panel-body [style*="color: #555"],
[data-theme="dark"] .panel-default .panel-body [style*="color:#555"],
[data-theme="dark"] .panel-default .panel-body [style*="color: #777"],
[data-theme="dark"] .panel-default .panel-body [style*="color:#777"] {
    color: #8b949e !important;
}

[data-theme="dark"] .panel-default .panel-body [style*="color: #333"],
[data-theme="dark"] .panel-default .panel-body [style*="color:#333"] {
    color: #e6edf3 !important;
}

[data-theme="dark"] .panel-default .panel-body [style*="border-color: #eee"] {
    border-color: #30363d !important;
}

[data-theme="dark"] .panel-default .panel-body [style*="background: #e8f5e9"] {
    background-color: #1a3a2a !important;
}

[data-theme="dark"] .panel-default .panel-body [style*="background: #fff3cd"] {
    background-color: #3a3000 !important;
}
</style>
<?= $this->endSection() ?>
