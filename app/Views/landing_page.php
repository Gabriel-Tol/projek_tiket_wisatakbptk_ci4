<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Pemesanan Tiket Wisata Terbaik di Kalimantan Barat. Jelajahi destinasi wisata unggulan dengan mudah.">
    <title>Wisata KalBar - Sistem Informasi Pemesanan Tiket Wisata</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('Assets/css/landing.css') ?>">
</head>
<body>

    <!-- 1. Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-geo-alt-fill me-2"></i>Wisata KalBar
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#destinasi">Destinasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0">
                    <a href="<?= base_url('login') ?>" class="btn btn-outline-primary me-2 px-4 rounded-pill">Login</a>
                    <a href="<?= base_url('register') ?>" class="btn btn-primary px-4 rounded-pill">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- 2. Hero Section -->
    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="hero-title" data-aos="fade-up">Jelajahi Destinasi Wisata Terbaik<br>Kalimantan Barat</h1>
                    <p class="hero-description" data-aos="fade-up" data-aos-delay="200">
                        Sistem Informasi Pemesanan Tiket Wisata memudahkan Anda untuk merencanakan liburan impian di bumi khatulistiwa. Pesan tiket secara online, cepat, dan aman.
                    </p>
                    <div data-aos="fade-up" data-aos-delay="400">
                        <a href="#destinasi" class="btn btn-primary btn-lg px-5 py-3 me-3 rounded-pill">Pesan Tiket Sekarang</a>
                        <a href="#destinasi" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill">Lihat Destinasi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Tentang Sistem -->
    <section id="tentang" class="section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1533105079780-92b9be482077?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Tentang Wisata" class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left">
                    <h2 class="section-title">Tentang Sistem Kami</h2>
                    <p class="lead">Sistem Informasi Pemesanan Tiket Wisata adalah platform digital yang dirancang untuk memajukan pariwisata di Kalimantan Barat.</p>
                    <p>Kami memberikan kemudahan bagi wisatawan untuk mengeksplorasi berbagai destinasi menarik, mulai dari wisata alam, budaya, hingga sejarah. Dengan sistem pemesanan online, Anda tidak perlu lagi antre panjang untuk mendapatkan tiket masuk.</p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Pemesanan 24/7</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Pembayaran Aman</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>E-Ticket Instan</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Informasi Terupdate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Destinasi Wisata Unggulan -->
    <section id="destinasi" class="section-padding bg-light">
        <div class="container text-center">
            <h2 class="section-title mx-auto">Destinasi Wisata Unggulan</h2>
            <div class="row mt-5">
                <!-- Destinasi 1 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-modern destinasi-card h-100">
                        <img src="<?= base_url('Assets/tugu katulistiwa.jpg') ?>" class="card-img-top" alt="Tugu Khatulistiwa">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Tugu Khatulistiwa</h5>
                            <p class="text-muted"><i class="bi bi-geo-alt me-1"></i> Pontianak</p>
                            <p class="card-text small text-secondary">Ikon kebanggaan kota Pontianak yang menjadi titik garis lintang nol derajat bumi.</p>
                            <a href="#" class="btn btn-primary rounded-pill w-100">Detail Wisata</a>
                        </div>
                    </div>
                </div>
                <!-- Destinasi 2 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-modern destinasi-card h-100">
                        <img src="<?= base_url('Assets/Pasir_Panjang_Beach,_Singkawang_City.jpg') ?>" class="card-img-top" alt="Pantai Pasir Panjang">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Pantai Pasir Panjang</h5>
                            <p class="text-muted"><i class="bi bi-geo-alt me-1"></i> Singkawang</p>
                            <p class="card-text small text-secondary">Pantai dengan hamparan pasir putih yang luas dan pemandangan sunset yang memukau.</p>
                            <a href="#" class="btn btn-primary rounded-pill w-100">Detail Wisata</a>
                        </div>
                    </div>
                </div>
                <!-- Destinasi 3 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-modern destinasi-card h-100">
                        <img src="<?= base_url('Assets/danau sentarum.jpg') ?>" class="card-img-top" alt="Danau Sentarum">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Danau Sentarum</h5>
                            <p class="text-muted"><i class="bi bi-geo-alt me-1"></i> Kapuas Hulu</p>
                            <p class="card-text small text-secondary">Taman Nasional perairan tawar yang unik dengan keanekaragaman hayati yang tinggi.</p>
                            <a href="#" class="btn btn-primary rounded-pill w-100">Detail Wisata</a>
                        </div>
                    </div>
                </div>
                <!-- Destinasi 4 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-modern destinasi-card h-100">
                        <img src="<?= base_url('Assets/bukit kelam.jpg') ?>" class="card-img-top" alt="Bukit Kelam">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Bukit Kelam</h5>
                            <p class="text-muted"><i class="bi bi-geo-alt me-1"></i> Sintang</p>
                            <p class="card-text small text-secondary">Batu monolit terbesar di dunia yang menawarkan tantangan pendakian dan pemandangan indah.</p>
                            <a href="#" class="btn btn-primary rounded-pill w-100">Detail Wisata</a>
                        </div>
                    </div>
                </div>
                <!-- Destinasi 5 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-modern destinasi-card h-100">
                        <img src="<?= base_url('Assets/pulau lemukutan.png') ?>" class="card-img-top" alt="Pulau Lemukutan">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Pulau Lemukutan</h5>
                            <p class="text-muted"><i class="bi bi-geo-alt me-1"></i> Bengkayang</p>
                            <p class="card-text small text-secondary">Surga bawah laut tersembunyi dengan terumbu karang yang masih sangat alami.</p>
                            <a href="#" class="btn btn-primary rounded-pill w-100">Detail Wisata</a>
                        </div>
                    </div>
                </div>
                <!-- Destinasi 6 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-modern destinasi-card h-100">
                        <img src="<?= base_url('Assets/Keraton Kadariah.jpg') ?>" class="card-img-top" alt="Keraton Kadariah">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Keraton Kadariah</h5>
                            <p class="text-muted"><i class="bi bi-geo-alt me-1"></i> Pontianak</p>
                            <p class="card-text small text-secondary">Saksi bisu sejarah berdirinya kota Pontianak dengan arsitektur kayu yang megah.</p>
                            <a href="#" class="btn btn-primary rounded-pill w-100">Detail Wisata</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Fitur Sistem -->
    <section id="fitur" class="section-padding">
        <div class="container text-center">
            <h2 class="section-title mx-auto">Fitur Unggulan Sistem</h2>
            <div class="row mt-5">
                <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="p-3">
                        <i class="bi bi-ticket-perforated feature-icon"></i>
                        <h5>Booking Online</h5>
                        <p class="small text-muted">Pesan tiket kapanpun dan dimanapun tanpa ribet.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="p-3">
                        <i class="bi bi-speedometer2 feature-icon"></i>
                        <h5>Dashboard Statistik</h5>
                        <p class="small text-muted">Pantau perkembangan wisata melalui data akurat.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="p-3">
                        <i class="bi bi-camera feature-icon"></i>
                        <h5>Galeri Foto</h5>
                        <p class="small text-muted">Lihat keindahan destinasi melalui foto berkualitas.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="p-3">
                        <i class="bi bi-file-earmark-bar-graph feature-icon"></i>
                        <h5>Laporan Real-time</h5>
                        <p class="small text-muted">Sistem pelaporan otomatis untuk manajemen.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="p-3">
                        <i class="bi bi-shield-lock feature-icon"></i>
                        <h5>Sistem Keamanan</h5>
                        <p class="small text-muted">Data pengunjung dan transaksi terjamin aman.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="p-3">
                        <i class="bi bi-people feature-icon"></i>
                        <h5>Manajemen User</h5>
                        <p class="small text-muted">Pengaturan hak akses admin dan pengunjung.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="p-3">
                        <i class="bi bi-tags feature-icon"></i>
                        <h5>Kategori Wisata</h5>
                        <p class="small text-muted">Pengelompokan destinasi berdasarkan jenisnya.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="p-3">
                        <i class="bi bi-qr-code feature-icon"></i>
                        <h5>Check-in QR Code</h5>
                        <p class="small text-muted">Validasi tiket masuk lebih cepat dengan QR Code.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Alur Pemesanan -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title text-center mx-auto">Alur Pemesanan Tiket</h2>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="row text-center">
                        <div class="col-md-2 col-sm-4 mb-4" data-aos="fade-right" data-aos-delay="100">
                            <div class="bg-white p-4 rounded-circle shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <span class="h3 fw-bold text-primary">1</span>
                            </div>
                            <h6>Pilih Destinasi</h6>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-4" data-aos="fade-right" data-aos-delay="200">
                            <div class="bg-white p-4 rounded-circle shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <span class="h3 fw-bold text-primary">2</span>
                            </div>
                            <h6>Isi Data Diri</h6>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-4" data-aos="fade-right" data-aos-delay="300">
                            <div class="bg-white p-4 rounded-circle shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <span class="h3 fw-bold text-primary">3</span>
                            </div>
                            <h6>Pilih Tiket</h6>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-4" data-aos="fade-right" data-aos-delay="400">
                            <div class="bg-white p-4 rounded-circle shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <span class="h3 fw-bold text-primary">4</span>
                            </div>
                            <h6>Pesan Tiket</h6>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-4" data-aos="fade-right" data-aos-delay="500">
                            <div class="bg-white p-4 rounded-circle shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <span class="h3 fw-bold text-primary">5</span>
                            </div>
                            <h6>Bayar</h6>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-4" data-aos="fade-right" data-aos-delay="600">
                            <div class="bg-white p-4 rounded-circle shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <span class="h3 fw-bold text-primary">6</span>
                            </div>
                            <h6>Cetak Tiket</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Statistik -->
    <section class="stats-section section-padding">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3 col-6 mb-4 mb-md-0" data-aos="fade-up">
                    <div class="stat-item">
                        <h3 class="counter" data-target="50">0</h3>
                        <p>Total Destinasi</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <h3 class="counter" data-target="1500">0</h3>
                        <p>Total Pengunjung</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <h3 class="counter" data-target="3200">0</h3>
                        <p>Total Pemesanan</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <h3 class="counter" data-target="15">0</h3>
                        <p>Kategori Wisata</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Galeri Wisata -->
    <section id="galeri" class="section-padding">
        <div class="container">
            <h2 class="section-title text-center mx-auto">Galeri Keindahan KalBar</h2>
            <div class="row mt-5">
                <div class="col-md-4 col-sm-6" data-aos="zoom-in">
                    <div class="gallery-item">
                        <img src="<?= base_url('Assets/pulau lemukutan.png') ?>" class="img-fluid" alt="Galeri 1">
                        <div class="gallery-overlay">
                            <span class="text-white fw-bold">Pantai KalBar</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="gallery-item">
                        <img src="<?= base_url('Assets/danau sentarum.jpg') ?>" class="img-fluid" alt="Galeri 2">
                        <div class="gallery-overlay">
                            <span class="text-white fw-bold">Danau Sentarum</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="gallery-item">
                        <img src="<?= base_url('Assets/bukit kelam.jpg') ?>" class="img-fluid" alt="Galeri 3">
                        <div class="gallery-overlay">
                            <span class="text-white fw-bold">Bukit Kelam</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="gallery-item">
                        <img src="<?= base_url('Assets/Keraton Kadariah.jpg') ?>" class="img-fluid" alt="Galeri 4">
                        <div class="gallery-overlay">
                            <span class="text-white fw-bold">Culture</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="gallery-item">
                        <img src="<?= base_url('Assets/Pasir_Panjang_Beach,_Singkawang_City.jpg') ?>" class="img-fluid" alt="Galeri 5">
                        <div class="gallery-overlay">
                            <span class="text-white fw-bold">Beach Life</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="500">
                    <div class="gallery-item">
                        <img src="<?= base_url('Assets/tugu katulistiwa.jpg') ?>" class="img-fluid" alt="Galeri 6">
                        <div class="gallery-overlay">
                            <span class="text-white fw-bold">Equator Monument</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. Testimoni -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title text-center mx-auto">Apa Kata Mereka?</h2>
            <div id="testimonialCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <i class="bi bi-quote fs-1 text-primary"></i>
                                <p class="lead italic">"Sangat membantu sekali! Sekarang saya tidak perlu antre di loket tiket Pantai Pasir Panjang. Prosesnya cepat dan gampang banget."</p>
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle mb-3" width="80" alt="User">
                                <h5 class="fw-bold">Feliks Gabriel</h5>
                                <p class="text-muted small">Wisatawan Domestik</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <i class="bi bi-quote fs-1 text-primary"></i>
                                <p class="lead italic">"Interface website-nya modern dan responsif di HP. Info destinasi wisatanya juga sangat lengkap, sangat membantu turis dari luar KalBar."</p>
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle mb-3" width="80" alt="User">
                                <h5 class="fw-bold">Siska Amelia</h5>
                                <p class="text-muted small">Travel Blogger</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <i class="bi bi-quote fs-1 text-primary"></i>
                                <p class="lead italic">"Akhirnya ada sistem pemesanan tiket wisata yang terintegrasi di Kalimantan Barat. Sangat memudahkan saat liburan keluarga kemarin."</p>
                                <img src="https://randomuser.me/api/portraits/men/85.jpg" class="rounded-circle mb-3" width="80" alt="User">
                                <h5 class="fw-bold">Budi Pratama</h5>
                                <p class="text-muted small">Wiraswasta</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- 10. Call To Action -->
    <section class="cta-section text-center">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4" data-aos="fade-up">Siap Berwisata di Kalimantan Barat?</h2>
            <p class="lead mb-5" data-aos="fade-up" data-aos-delay="200">Bergabunglah dengan ribuan wisatawan lainnya dan nikmati kemudahan berwisata.</p>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold text-success" data-aos="fade-up" data-aos-delay="400">Pesan Tiket Sekarang</a>
        </div>
    </section>

    <!-- 11. Footer -->
    <footer id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-white"><i class="bi bi-geo-alt-fill me-2"></i>Wisata KalBar</h5>
                    <p class="mt-3">Sistem Informasi Pemesanan Tiket Wisata terbaik yang menyajikan kemudahan eksplorasi destinasi unggulan di Kalimantan Barat secara digital dan terintegrasi.</p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#destinasi">Destinasi</a></li>
                        <li><a href="#fitur">Fitur</a></li>
                        <li><a href="#galeri">Galeri</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Dukungan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Bantuan</a></li>
                        <li><a href="#">Panduan</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 mb-4">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled text-light">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i> Jl. Ahmad Yani No. 1, Pontianak, Kalimantan Barat</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2 text-primary"></i> info@wisatakalbar.com</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2 text-primary"></i> +62 812 3456 7890</li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4 border-secondary">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="small mb-0">&copy; 2026 Wisata KalBar. All Rights Reserved. Built with <i class="bi bi-heart-fill text-danger"></i> for Kalimantan Barat.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('Assets/js/landing.js') ?>"></script>

</body>
</html>
</script>

</body>
</html>
