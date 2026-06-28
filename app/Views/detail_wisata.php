<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $destinasi['nama_destinasi'] ?> - Wisata KalBar">
    <title><?= $destinasi['nama_destinasi'] ?> - Wisata KalBar</title>
    
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('Assets/css/landing.css') ?>">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <i class="bi bi-geo-alt-fill me-2"></i>Wisata KalBar
            </a>
            <div class="d-flex align-items-center gap-2 ms-auto ms-lg-0">
                <button id="darkModeToggle" class="btn btn-outline-light rounded-circle p-1 p-lg-2 border-0" style="width: 36px; height: 36px;" title="Toggle Dark Mode">
                    <i id="darkModeIcon" class="bi bi-moon-fill"></i>
                </button>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/#destinasi') ?>">Destinasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/#tentang') ?>">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/#kontak') ?>">Kontak</a></li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0 d-flex align-items-center gap-2">
                    <a href="<?= base_url('login') ?>" class="btn btn-outline-light px-4 rounded-pill">Login</a>
                    <a href="<?= base_url('register') ?>" class="btn btn-light px-4 rounded-pill">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Detail Section -->
    <section class="pt-5 mt-5">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-up">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/#destinasi') ?>" class="text-decoration-none">Destinasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $destinasi['nama_destinasi'] ?></li>
                </ol>
            </nav>

            <div class="row">
                <!-- Gambar Utama -->
                <div class="col-lg-8 mb-4" data-aos="fade-right">
                    <?php 
                    $images = [
                        'DST002' => 'Assets/Pasir_Panjang_Beach,_Singkawang_City.jpg',
                        'DST003' => 'Assets/tugu katulistiwa.jpg',
                        'DST004' => 'Assets/danau sentarum.jpg',
                        'DST005' => 'Assets/bukit kelam.jpg',
                        'DST006' => 'Assets/pulau lemukutan.png',
                        'DST007' => 'Assets/Keraton Kadariah.jpg',
                    ];
                    $imgPath = $images[$destinasi['id_destinasi']] ?? 'Assets/default.jpg';
                    ?>
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <img src="<?= base_url($imgPath) ?>" class="img-fluid" alt="<?= $destinasi['nama_destinasi'] ?>" style="max-height: 500px; object-fit: cover; width: 100%;">
                    </div>
                </div>

                <!-- Info Singkat -->
                <div class="col-lg-4 mb-4" data-aos="fade-left">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <span class="badge bg-primary mb-3"><?= $kategori['nama_kategori'] ?? 'Wisata' ?></span>
                            <h2 class="fw-bold mb-3"><?= $destinasi['nama_destinasi'] ?></h2>
                            <p class="text-muted mb-3">
                                <i class="bi bi-geo-alt-fill text-danger me-2"></i> <?= $destinasi['lokasi'] ?>
                            </p>
                            
                            <hr>
                            
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                                    <i class="bi bi-clock text-primary fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Jam Operasional</small>
                                    <strong>08:00 - 17:00 WIB</strong>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                                    <i class="bi bi-ticket-perforated text-success fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Harga Tiket</small>
                                    <strong class="text-primary fs-5">Rp <?= number_format($destinasi['harga_tiket'], 0, ',', '.') ?></strong>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-4">
                                <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                                    <i class="bi bi-box-seam text-warning fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Stok Tersedia</small>
                                    <strong><?= $destinasi['stok_tiket'] ?> Tiket</strong>
                                </div>
                            </div>

                            <a href="<?= base_url('/#destinasi') ?>" class="btn btn-outline-secondary w-100 mb-2 rounded-pill">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Destinasi
                            </a>
                            <a href="<?= base_url('auth/login') ?>" class="btn btn-primary w-100 rounded-pill">
                                <i class="bi bi-cart-check me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="row mt-4">
                <div class="col-12" data-aos="fade-up">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i>Deskripsi Wisata</h4>
                            <p class="lead fw-bold" style="line-height: 1.8; color: #333;">
                                <?= nl2br($destinasi['deskripsi']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fasilitas & Informasi -->
            <div class="row mt-4">
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Fasilitas</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Parkir Luas</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Toilet Bersih</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Musholla</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Warung Makan</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Gazebo</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Spot Foto</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Lokasi</h5>
                            <p class="mb-3"><?= $destinasi['lokasi'] ?></p>
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127672.09457861873!2d109.35!3d0.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1f2f2f2f2f2f2f%3A0x0!2sKalimantan+Barat!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                                        style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-white"><i class="bi bi-geo-alt-fill me-2"></i>Wisata KalBar</h5>
                    <p class="mt-3">Sistem Informasi Pemesanan Tiket Wisata terbaik di Kalimantan Barat.</p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled text-light">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i> Jl. Ahmad Yani No. 1, Pontianak</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2 text-primary"></i> info@wisatakalbar.com</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2 text-primary"></i> +62 812 3456 7890</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('/') ?>">Beranda</a></li>
                        <li><a href="<?= base_url('/#destinasi') ?>">Destinasi</a></li>
                        <li><a href="<?= base_url('login') ?>">Login</a></li>
                        <li><a href="<?= base_url('register') ?>">Daftar</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4 border-secondary">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="small mb-0">&copy; 2026 Wisata KalBar. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?= base_url('Assets/js/landing.js') ?>"></script>
    <script>
        AOS.init({ once: true });
    </script>
</body>
</html>
