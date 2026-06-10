<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Wisata Kalbar</title>
    <!-- CSS Bootstrap & Template -->
    <link href="<?= base_url('Assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Assets/css/styles.css') ?>" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="<?= base_url('Assets/css/sweetalert2.min.css') ?>" rel="stylesheet">
    
    <style>
        body {
            background: url('<?= base_url('Assets/bukit%20kelam.jpg') ?>') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 !important;
            margin: 0;
        }
        .login-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
            z-index: -1;
        }
        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
            font-size: 36px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }
        .login-logo span {
            color: #30a5ff;
            font-weight: 800;
        }
        .login-panel {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            border: none;
        }
        .panel-heading {
            background: #fff !important;
            color: #30a5ff !important;
            text-align: center !important;
            font-weight: 700 !important;
            font-size: 20px !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            padding: 25px !important;
            height: auto !important;
            border-bottom: 1px solid #f1f4f7 !important;
        }
        .panel-body {
            padding: 35px 30px;
        }
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        .form-control {
            height: 50px;
            border-radius: 6px;
            padding-left: 45px;
            border: 1px solid #ddd;
            font-size: 15px;
            box-shadow: none !important;
        }
        .form-control:focus {
            border-color: #30a5ff;
        }
        .form-group .glyphicon {
            position: absolute;
            left: 18px;
            top: 17px;
            color: #30a5ff;
            z-index: 2;
            font-size: 16px;
        }
        .btn-primary {
            width: 100%;
            padding: 14px;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-radius: 6px;
            background-color: #30a5ff;
            border: none;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        .btn-primary:hover {
            background-color: #2795e9;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(48, 165, 255, 0.4);
        }
    </style>
</head>
<body>

<div class="login-overlay"></div>

<div class="login-wrapper">
    <div class="login-logo">
        <span>WISATA</span>KALBAR
    </div>
    
    <div class="login-panel panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
            <form action="<?= base_url('login/autentikasi'); ?>" method="post">
                <div class="form-group">
                    <span class="glyphicon glyphicon-envelope"></span>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required autofocus>
                </div>
                <div class="form-group">
                    <span class="glyphicon glyphicon-lock"></span>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    <p class="text-center" style="color: rgba(255,255,255,0.7); margin-top: 30px; font-size: 13px; font-weight: 300; letter-spacing: 1px;">
        &copy; <?= date('Y') ?> Wisata CI4. All rights reserved.
    </p>
</div>

<!-- JavaScript -->
<script src="<?= base_url('Assets/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('Assets/js/sweetalert2.min.js') ?>"></script>

<!-- Notifikasi SweetAlert2 untuk error -->
<?php if (session()->getFlashdata('error')) : ?>
<script>
    $(document).ready(function() {
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            text: '<?= session()->getFlashdata('error') ?>',
            confirmButtonColor: '#30a5ff'
        });
    });
</script>
<?php endif; ?>

</body>
</html>
