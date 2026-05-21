<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Wisata Kalbar</title>
    <!-- CSS Bootstrap & Template -->
    <link href="/Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Assets/css/styles.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="/Assets/css/sweetalert2.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 100px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login Wisata</h3>
                </div>
                <div class="panel-body">
                    <!-- Arahkan action ke route autentikasi -->
                    <form action="<?= base_url('login/autentikasi'); ?>" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="/Assets/js/jquery-1.11.1.min.js"></script>
<script src="/Assets/js/bootstrap.min.js"></script>
<script src="/Assets/js/sweetalert2.min.js"></script>

<!-- Notifikasi SweetAlert2 untuk error -->
<?php if (session()->getFlashdata('error')) : ?>
<script>
    $(document).ready(function() {
        swal("Login Gagal!", "<?= session()->getFlashdata('error') ?>", "error");
    });
</script>
<?php endif; ?>

</body>
</html>