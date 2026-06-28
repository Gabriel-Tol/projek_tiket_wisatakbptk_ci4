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
            <div class="d-flex align-items-center gap-2 ms-auto ms-lg-0">
                <button id="darkModeToggle" class="btn btn-outline-light rounded-circle p-1 p-lg-2 border-0" style="width: 36px; height: 36px;" title="Toggle Dark Mode">
                    <i id="darkModeIcon" class="bi bi-moon-fill"></i>
                </button>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#destinasi">Destinasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0 d-flex align-items-center gap-2">
                    <a href="<?= base_url('login') ?>" class="btn btn-outline-light px-4 rounded-pill">Login</a>
                    <a href="<?= base_url('register') ?>" class="btn btn-light px-4 rounded-pill">Daftar</a>
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
                    <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
                        <a href="#destinasi" class="btn btn-primary btn-lg px-4 px-md-5 py-3 rounded-pill">Pesan Tiket Sekarang</a>
                        <a href="#destinasi" class="btn btn-outline-light btn-lg px-4 px-md-5 py-3 rounded-pill">Lihat Destinasi</a>
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
                    <img src="<?= base_url('Assets/tugu%20katulistiwa.jpg') ?>" alt="Tugu Katulistiwa" class="img-fluid rounded-4 shadow">
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
            <p class="text-muted mx-auto mt-3 mb-4" style="max-width:600px;">
                Jelajahi keindahan alam dan budaya Kalimantan Barat. Klik atau hover pada kartu untuk melihat detail.
            </p>
            <?php
            $images = [
                'DST002' => 'Assets/Pasir_Panjang_Beach,_Singkawang_City.jpg',
                'DST003' => 'Assets/tugu katulistiwa.jpg',
                'DST004' => 'Assets/danau sentarum.jpg',
                'DST005' => 'Assets/bukit kelam.jpg',
                'DST006' => 'Assets/pulau lemukutan.png',
                'DST007' => 'Assets/Keraton Kadariah.jpg',
            ];
            $icons = [
                'DST002' => 'bi-water',
                'DST003' => 'bi-compass',
                'DST004' => 'bi-water',
                'DST005' => 'bi-tree',
                'DST006' => 'bi-water',
                'DST007' => 'bi-building',
            ];
            ?>
            <?php if (!empty($destinasi)) : ?>
                <ul class="expanding-cards" id="expandingCards">
                    <?php foreach ($destinasi as $i => $des) : ?>
                        <?php
                        $imgPath = $images[$des['id_destinasi']] ?? 'Assets/default.jpg';
                        $icon = $icons[$des['id_destinasi']] ?? 'bi-geo-alt';
                        $lokasi = explode(',', $des['lokasi']);
                        $lokasiShort = trim($lokasi[0]);
                        $deskripsi = strlen($des['deskripsi']) > 120 ? substr($des['deskripsi'], 0, 120) . '...' : $des['deskripsi'];
                        $active = $i === 0 ? 'true' : 'false';
                        ?>
                        <li class="expanding-card" data-active="<?= $active ?>" tabindex="0"
                            data-index="<?= $i ?>">
                            <img src="<?= base_url($imgPath) ?>" alt="<?= $des['nama_destinasi'] ?>">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <div class="card-icon"><i class="bi <?= $icon ?>"></i></div>
                                <h3 class="card-title-main"><?= $des['nama_destinasi'] ?></h3>
                                <p class="card-desc"><i class="bi bi-geo-alt me-1"></i><?= $lokasiShort ?> &mdash; <?= $deskripsi ?></p>
                                <a href="<?= base_url('destinasi/detail/' . $des['id_destinasi']) ?>" class="card-link">
                                    Lihat Detail <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
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

    <!-- 8. Galeri Wisata - Infinite Auto Slider -->
    <section id="galeri" class="gallery-slider-section">
        <div class="gallery-slider-bg"></div>
        <div class="container text-center position-relative" style="z-index: 10;">
            <h2 class="section-title mx-auto">Galeri Keindahan KalBar</h2>
            <p class="text-muted mx-auto mt-3 mb-5" style="max-width:600px;">
                Jelajahi keindahan Kalimantan Barat melalui galeri interaktif kami
            </p>
        </div>
        <?php
        $gallerySliderImages = [
            'Assets/pulau lemukutan.png',
            'Assets/danau sentarum.jpg',
            'Assets/bukit kelam.jpg',
            'Assets/Keraton Kadariah.jpg',
            'Assets/Pasir_Panjang_Beach,_Singkawang_City.jpg',
            'Assets/tugu katulistiwa.jpg',
        ];
        ?>
        <div class="gallery-scroll-container">
            <div class="gallery-infinite-scroll" id="galleryInfiniteScroll">
                <?php foreach ($gallerySliderImages as $img): ?>
                    <div class="gallery-image-item">
                        <img src="<?= base_url($img) ?>" alt="Galeri Wisata" loading="lazy">
                    </div>
                <?php endforeach; ?>
                <?php foreach ($gallerySliderImages as $img): ?>
                    <div class="gallery-image-item">
                        <img src="<?= base_url($img) ?>" alt="Galeri Wisata" loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="gallery-fade-left"></div>
        <div class="gallery-fade-right"></div>
    </section>

    <!-- 9. Testimoni - Vertical Scrolling Columns -->
    <section class="testimonials-section section-padding">
        <div class="container">
            <div class="testimonials-header" data-aos="fade-up">
                <span class="testimonials-badge">Testimonials</span>
                <h2 class="section-title mx-auto mb-3">Apa Kata Mereka?</h2>
                <p class="text-muted">Lihat apa kata pelanggan kami tentang layanan kami.</p>
            </div>

            <div class="testimonials-container">
                <div class="testimonials-column" data-duration="15">
                    <div class="testimonials-scroll">
                        <?php
                        $testimonials1 = [
                            ['text' => '"Sangat membantu sekali! Sekarang saya tidak perlu antre di loket tiket Pantai Pasir Panjang. Prosesnya cepat dan gampang banget."', 'image' => 'https://randomuser.me/api/portraits/men/32.jpg', 'name' => 'Feliks Gabriel', 'role' => 'Wisatawan Domestik'],
                            ['text' => '"Implementasi sistem ini sangat mudah dan cepat. Antarmuka yang ramah pengguna membuat pelatihan tim menjadi mudah."', 'image' => 'https://randomuser.me/api/portraits/men/2.jpg', 'name' => 'Ahmad Rizky', 'role' => 'Manager Operasional'],
                            ['text' => '"Fitur yang kuat dan dukungan cepat telah mengubah cara kerja kami, membuat kami jauh lebih efisien."', 'image' => 'https://randomuser.me/api/portraits/women/5.jpg', 'name' => 'Siti Nurhaliza', 'role' => 'Project Manager'],
                        ];
                        foreach ($testimonials1 as $t): ?>
                            <div class="testimonial-card">
                                <div class="testimonial-text"><?= $t['text'] ?></div>
                                <div class="testimonial-author">
                                    <img src="<?= $t['image'] ?>" alt="<?= $t['name'] ?>" class="testimonial-avatar">
                                    <div class="testimonial-info">
                                        <div class="testimonial-name"><?= $t['name'] ?></div>
                                        <div class="testimonial-role"><?= $t['role'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach ($testimonials1 as $t): ?>
                            <div class="testimonial-card">
                                <div class="testimonial-text"><?= $t['text'] ?></div>
                                <div class="testimonial-author">
                                    <img src="<?= $t['image'] ?>" alt="<?= $t['name'] ?>" class="testimonial-avatar">
                                    <div class="testimonial-info">
                                        <div class="testimonial-name"><?= $t['name'] ?></div>
                                        <div class="testimonial-role"><?= $t['role'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="testimonials-column" data-duration="19">
                    <div class="testimonials-scroll">
                        <?php
                        $testimonials2 = [
                            ['text' => '"Interface website-nya modern dan responsif di HP. Info destinasi wisatanya juga sangat lengkap, sangat membantu turis dari luar KalBar."', 'image' => 'https://randomuser.me/api/portraits/women/44.jpg', 'name' => 'Siska Amelia', 'role' => 'Travel Blogger'],
                            ['text' => '"Dukungan pelanggan kami luar biasa, memandu kami melalui pengaturan dan memberikan bantuan berkelanjutan."', 'image' => 'https://randomuser.me/api/portraits/women/3.jpg', 'name' => 'Maya Putri', 'role' => 'Customer Support Lead'],
                            ['text' => '"Integrasi yang mulus telah meningkatkan operasi dan efisiensi bisnis kami. Sangat direkomendasikan."', 'image' => 'https://randomuser.me/api/portraits/men/4.jpg', 'name' => 'Dani Kurniawan', 'role' => 'CEO'],
                        ];
                        foreach ($testimonials2 as $t): ?>
                            <div class="testimonial-card">
                                <div class="testimonial-text"><?= $t['text'] ?></div>
                                <div class="testimonial-author">
                                    <img src="<?= $t['image'] ?>" alt="<?= $t['name'] ?>" class="testimonial-avatar">
                                    <div class="testimonial-info">
                                        <div class="testimonial-name"><?= $t['name'] ?></div>
                                        <div class="testimonial-role"><?= $t['role'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach ($testimonials2 as $t): ?>
                            <div class="testimonial-card">
                                <div class="testimonial-text"><?= $t['text'] ?></div>
                                <div class="testimonial-author">
                                    <img src="<?= $t['image'] ?>" alt="<?= $t['name'] ?>" class="testimonial-avatar">
                                    <div class="testimonial-info">
                                        <div class="testimonial-name"><?= $t['name'] ?></div>
                                        <div class="testimonial-role"><?= $t['role'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="testimonials-column testimonials-column-hide-mobile" data-duration="17">
                    <div class="testimonials-scroll">
                        <?php
                        $testimonials3 = [
                            ['text' => '"Akhirnya ada sistem pemesanan tiket wisata yang terintegrasi di Kalimantan Barat. Sangat memudahkan saat liburan keluarga kemarin."', 'image' => 'https://randomuser.me/api/portraits/men/85.jpg', 'name' => 'Budi Pratama', 'role' => 'Wiraswasta'],
                            ['text' => '"Implementasi yang mulus melebihi ekspektasi. Mempermudah proses, meningkatkan kinerja bisnis secara keseluruhan."', 'image' => 'https://randomuser.me/api/portraits/women/6.jpg', 'name' => 'Rina Wati', 'role' => 'Business Analyst'],
                            ['text' => '"Bisnis kami meningkat dengan desain ramah pengguna dan umpan balik pelanggan yang positif."', 'image' => 'https://randomuser.me/api/portraits/men/7.jpg', 'name' => 'Hendra Susanto', 'role' => 'Marketing Director'],
                        ];
                        foreach ($testimonials3 as $t): ?>
                            <div class="testimonial-card">
                                <div class="testimonial-text"><?= $t['text'] ?></div>
                                <div class="testimonial-author">
                                    <img src="<?= $t['image'] ?>" alt="<?= $t['name'] ?>" class="testimonial-avatar">
                                    <div class="testimonial-info">
                                        <div class="testimonial-name"><?= $t['name'] ?></div>
                                        <div class="testimonial-role"><?= $t['role'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach ($testimonials3 as $t): ?>
                            <div class="testimonial-card">
                                <div class="testimonial-text"><?= $t['text'] ?></div>
                                <div class="testimonial-author">
                                    <img src="<?= $t['image'] ?>" alt="<?= $t['name'] ?>" class="testimonial-avatar">
                                    <div class="testimonial-info">
                                        <div class="testimonial-name"><?= $t['name'] ?></div>
                                        <div class="testimonial-role"><?= $t['role'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. Call To Action -->
    <section class="cta-section text-center">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4" data-aos="fade-up">Siap Berwisata di Kalimantan Barat?</h2>
            <p class="lead mb-5" data-aos="fade-up" data-aos-delay="200">Bergabunglah dengan ribuan wisatawan lainnya dan nikmati kemudahan berwisata.</p>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold text-primary" data-aos="fade-up" data-aos-delay="400">Pesan Tiket Sekarang</a>
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
