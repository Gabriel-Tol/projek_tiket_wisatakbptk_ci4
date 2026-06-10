<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - Wisata Kalbar</title>
    <!-- CSS Bootstrap & Template -->
    <link href="/Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Assets/css/styles.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 100px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Akun Wisata</h3>
                </div>
                <div class="panel-body">
                    <!-- Notifikasi flashdata -->
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('register/simpan'); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
                    </form>
                    <hr>
                    <p class="text-center">Sudah punya akun? <a href="<?= base_url('login') ?>">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="/Assets/js/jquery-1.11.1.min.js"></script>
<script src="/Assets/js/bootstrap.min.js"></script>

</body>
</html>