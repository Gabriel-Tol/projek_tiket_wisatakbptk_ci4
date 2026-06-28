<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Wisata KalBar</title>
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e3f2fd 0%, #e8eaf6 50%, #ffffff 100%);
            padding: 0;
        }

        .register-wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* ── Left Side - Hero Section ── */
        .hero-section {
            display: none;
            width: 50%;
            position: relative;
            overflow: hidden;
        }

        @media (min-width: 992px) {
            .hero-section {
                display: flex;
                flex-direction: column;
            }
        }

        .hero-bg {
            position: absolute;
            inset: 0;
        }

        .hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(21, 101, 192, 0.80) 0%, rgba(13, 71, 161, 0.75) 100%);
        }

        .hero-blobs {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: blobPulse 4s ease-in-out infinite alternate;
        }

        .blob-1 {
            width: 280px;
            height: 280px;
            background: rgba(33, 150, 243, 0.25);
            top: 12%;
            left: 10%;
        }

        .blob-2 {
            width: 400px;
            height: 400px;
            background: rgba(63, 81, 181, 0.20);
            bottom: 12%;
            right: 8%;
            animation-delay: 1s;
        }

        @keyframes blobPulse {
            0%   { transform: scale(1)   translateY(0); }
            100% { transform: scale(1.15) translateY(-18px); }
        }

        .hero-content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px 48px;
            height: 100%;
            width: 100%;
        }

        .hero-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            animation: fadeDown .6s ease-out both;
        }

        .hero-logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #42a5f5, #1565c0);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 24px rgba(33, 150, 243, .35);
            color: #fff;
            font-size: 24px;
        }

        .hero-logo-text h1 {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            line-height: 1.1;
        }

        .hero-logo-text span {
            font-size: 11px;
            color: #bbdefb;
            font-weight: 400;
        }

        .hero-main {
            animation: fadeUp .6s ease-out .2s both;
        }

        .hero-main h2 {
            font-size: 38px;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 14px;
        }

        .hero-main p {
            color: #bbdefb;
            font-size: 15px;
            max-width: 380px;
            line-height: 1.6;
        }

        .floating-cards {
            position: relative;
            height: 210px;
            margin-top: 28px;
        }

        .float-card {
            position: absolute;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 16px;
            padding: 10px 14px;
            border: 1px solid rgba(255,255,255,0.18);
            box-shadow: 0 8px 32px rgba(0,0,0,.18);
            display: flex;
            align-items: center;
            gap: 10px;
            animation: cardFloat 4s ease-in-out infinite;
            white-space: nowrap;
        }

        .float-card:nth-child(1) { top: 0;   left: 0;   animation-delay: 0s; }
        .float-card:nth-child(2) { top: 55px; left: 100px; animation-delay: .7s; }
        .float-card:nth-child(3) { top: 110px; left: 200px; animation-delay: 1.4s; }

        .float-card img {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            object-fit: cover;
        }

        .float-card .card-info p:first-child {
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            margin: 0;
        }

        .float-card .card-info p:last-child {
            color: rgba(255,255,255,0.6);
            font-size: 10px;
            margin: 0;
        }

        @keyframes cardFloat {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-14px); }
        }

        .hero-stats {
            display: flex;
            gap: 16px;
            animation: fadeUp .6s ease-out 1s both;
        }

        .stat-box {
            background: rgba(255,255,255,0.10);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 16px 20px;
            border: 1px solid rgba(255,255,255,0.18);
        }

        .stat-box p.stat-num {
            font-size: 26px;
            font-weight: 700;
            color: #fff;
            margin: 0;
            line-height: 1;
        }

        .stat-box p.stat-label {
            font-size: 12px;
            color: #bbdefb;
            margin: 4px 0 0;
        }

        /* ── Right Side - Form ── */
        .form-section {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 24px;
        }

        @media (min-width: 992px) {
            .form-section {
                width: 50%;
                padding: 40px 56px;
            }
        }

        .form-card {
            width: 100%;
            max-width: 460px;
        }

        .mobile-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 28px;
        }

        @media (min-width: 992px) {
            .mobile-logo { display: none; }
        }

        .mobile-logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #42a5f5, #1565c0);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
            box-shadow: 0 8px 24px rgba(33,150,243,.30);
        }

        .mobile-logo h1 {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
        }

        /* Glass card */
        .glass-card {
            background: rgba(255,255,255,0.82);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
            border: 1px solid rgba(255,255,255,0.35);
            padding: 36px 32px;
            animation: scaleIn .5s ease-out both;
        }

        @media (min-width: 992px) {
            .glass-card { padding: 40px 36px; }
        }

        .card-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .card-logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #42a5f5, #1565c0);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(33,150,243,0.30);
            color: #fff;
            font-size: 28px;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 24px;
        }

        .welcome-text h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 6px;
        }

        .welcome-text p {
            color: #64748b;
            font-size: 13px;
        }

        /* Form */
        .field-group {
            margin-bottom: 16px;
        }

        .field-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #334155;
            margin-bottom: 6px;
        }

        .field-group label .req {
            color: #2196f3;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 18px;
            pointer-events: none;
            z-index: 2;
        }

        .input-wrap input,
        .input-wrap textarea {
            width: 100%;
            height: 46px;
            padding: 0 14px 0 44px;
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            color: #1e293b;
            background: #f8fafc;
            transition: all .2s ease;
        }

        .input-wrap textarea {
            height: auto;
            min-height: 80px;
            padding: 12px 14px 12px 44px;
            resize: vertical;
        }

        .input-wrap input::placeholder,
        .input-wrap textarea::placeholder { color: #94a3b8; }

        .input-wrap input:focus,
        .input-wrap textarea:focus {
            outline: none;
            border-color: #2196f3;
            box-shadow: 0 0 0 3px rgba(33,150,243,0.12);
            background: #fff;
        }

        .input-wrap .pw-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 4px;
            font-size: 18px;
            transition: color .2s;
            z-index: 2;
        }

        .input-wrap .pw-toggle:hover { color: #64748b; }

        /* Two columns */
        .field-row {
            display: flex;
            gap: 14px;
        }

        .field-row > .field-group {
            flex: 1;
        }

        /* Submit button */
        .btn-register {
            width: 100%;
            height: 48px;
            background: linear-gradient(135deg, #1976d2, #1565c0);
            border: none;
            border-radius: 16px;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all .3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 6px 20px rgba(25,118,210,0.30);
            position: relative;
            overflow: hidden;
            margin-top: 8px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(25,118,210,0.40);
        }

        .btn-register:active { transform: translateY(0); }

        .btn-register .btn-shine {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
            transition: left .5s ease;
        }

        .btn-register:hover .btn-shine { left: 100%; }

        .btn-register i { transition: transform .3s; }
        .btn-register:hover i { transform: translateX(4px); }

        /* Login link */
        .login-link {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: #64748b;
        }

        .login-link a {
            color: #2196f3;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {             color: #1976d2; }

        /* Footer */
        .form-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 12px;
            color: #94a3b8;
        }

        /* Alert */
        .alert-custom {
            border-radius: 14px;
            font-size: 13px;
            margin-bottom: 16px;
            padding: 12px 16px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }

        .alert-custom ul {
            margin: 0;
            padding-left: 18px;
        }

        .alert-custom ul li { margin-bottom: 2px; }

        /* Animations */
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to   { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>

<div class="register-wrapper">

    <!-- ════ Left Side - Hero ════ -->
    <div class="hero-section">
        <div class="hero-bg">
            <img src="<?= base_url('Assets/fajruddin-mudzakkir-TG50QzQzZm0-unsplash.jpg') ?>" alt="West Kalimantan Tourism">
        </div>

        <div class="hero-blobs">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
        </div>

        <div class="hero-content">
            <div class="hero-logo">
                <div class="hero-logo-icon"><i class="bi bi-compass"></i></div>
                <div class="hero-logo-text">
                    <h1>Wisata Kalbar</h1>
                    <span>West Kalimantan Tourism</span>
                </div>
            </div>

            <div class="hero-main">
                <h2>Jelajahi Keindahan<br>Kalimantan Barat<br>dengan Mudah</h2>
                <p>Temukan destinasi wisata terbaik, pesan tiket dengan mudah, dan kelola perjalanan Anda dalam satu platform.</p>

                <div class="floating-cards">
                    <div class="float-card">
                        <img src="<?= base_url('Assets/danau sentarum.jpg') ?>" alt="Danau Sentarum">
                        <div class="card-info">
                            <p>Danau Sentarum</p>
                            <p>West Kalimantan</p>
                        </div>
                    </div>
                    <div class="float-card">
                        <img src="<?= base_url('Assets/tugu katulistiwa.jpg') ?>" alt="Tugu Khatulistiwa">
                        <div class="card-info">
                            <p>Tugu Khatulistiwa</p>
                            <p>West Kalimantan</p>
                        </div>
                    </div>
                    <div class="float-card">
                        <img src="<?= base_url('Assets/Pasir_Panjang_Beach,_Singkawang_City.jpg') ?>" alt="Pantai Pasir Panjang">
                        <div class="card-info">
                            <p>Pantai Pasir Panjang</p>
                            <p>West Kalimantan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-stats">
                <div class="stat-box">
                    <p class="stat-num">50+</p>
                    <p class="stat-label">Destinasi Wisata</p>
                </div>
                <div class="stat-box">
                    <p class="stat-num">10K+</p>
                    <p class="stat-label">Wisatawan Puas</p>
                </div>
                <div class="stat-box">
                    <p class="stat-num">4.8</p>
                    <p class="stat-label">Rating Pengguna</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ════ Right Side - Form ════ -->
    <div class="form-section">
        <div class="form-card">

            <!-- Mobile logo -->
            <div class="mobile-logo">
                <div class="mobile-logo-icon"><i class="bi bi-compass"></i></div>
                <h1>Wisata Kalbar</h1>
            </div>

            <!-- Glass card -->
            <div class="glass-card">

                <div class="card-logo">
                    <div class="card-logo-icon"><i class="bi bi-person-plus-fill"></i></div>
                </div>

                <div class="welcome-text">
                    <h2>Buat Akun Baru</h2>
                    <p>Isi data diri Anda untuk mulai memesan tiket wisata.</p>
                </div>

                <!-- Errors -->
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert-custom">
                        <i class="bi bi-exclamation-circle"></i>
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $err) : ?>
                                <li><?= $err ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/simpan_registrasi') ?>" method="post">

                    <!-- Nama -->
                    <div class="field-group">
                        <label for="nama">Nama Lengkap <span class="req">*</span></label>
                        <div class="input-wrap">
                            <i class="bi bi-person input-icon"></i>
                            <input id="nama" type="text" name="nama"
                                   placeholder="Masukkan nama lengkap"
                                   value="<?= old('nama') ?>" required autofocus>
                        </div>
                    </div>

                    <!-- Email + No HP -->
                    <div class="field-row">
                        <div class="field-group">
                            <label for="email">Email <span class="req">*</span></label>
                            <div class="input-wrap">
                                <i class="bi bi-envelope input-icon"></i>
                                <input id="email" type="email" name="email"
                                       placeholder="nama@email.com"
                                       value="<?= old('email') ?>" required>
                            </div>
                        </div>
                        <div class="field-group">
                            <label for="no_hp">No. HP <span class="req">*</span></label>
                            <div class="input-wrap">
                                <i class="bi bi-telephone input-icon"></i>
                                <input id="no_hp" type="text" name="no_hp"
                                       placeholder="08xxx"
                                       value="<?= old('no_hp') ?>" required>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="field-group">
                        <label for="alamat">Alamat <span class="req">*</span></label>
                        <div class="input-wrap">
                            <i class="bi bi-geo-alt input-icon"></i>
                            <textarea id="alamat" name="alamat"
                                      placeholder="Masukkan alamat lengkap" required><?= old('alamat') ?></textarea>
                        </div>
                    </div>

                    <!-- Password + Konfirmasi -->
                    <div class="field-row">
                        <div class="field-group">
                            <label for="password">Kata Sandi <span class="req">*</span></label>
                            <div class="input-wrap">
                                <i class="bi bi-lock input-icon"></i>
                                <input id="password" type="password" name="password"
                                       placeholder="Min 6 karakter" required>
                                <button type="button" class="pw-toggle" onclick="togglePw('password','pwIcon1')">
                                    <i id="pwIcon1" class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="field-group">
                            <label for="konfirmasi_password">Konfirmasi <span class="req">*</span></label>
                            <div class="input-wrap">
                                <i class="bi bi-lock input-icon"></i>
                                <input id="konfirmasi_password" type="password" name="konfirmasi_password"
                                       placeholder="Ulangi kata sandi" required>
                                <button type="button" class="pw-toggle" onclick="togglePw('konfirmasi_password','pwIcon2')">
                                    <i id="pwIcon2" class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn-register">
                        <span class="btn-shine"></span>
                        Daftar Sekarang
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </form>

                <!-- Login link -->
                <div class="login-link">
                    Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Masuk di sini</a>
                </div>
            </div>

            <div class="form-footer">&copy; <?= date('Y') ?> Wisata Kalbar. All rights reserved.</div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function togglePw(inputId, iconId) {
        const inp = document.getElementById(inputId);
        const ic  = document.getElementById(iconId);
        if (inp.type === 'password') {
            inp.type = 'text';
            ic.className = 'bi bi-eye-slash';
        } else {
            inp.type = 'password';
            ic.className = 'bi bi-eye';
        }
    }
</script>

</body>
</html>
