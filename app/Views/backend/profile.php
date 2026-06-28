<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>
<?php /** @var array $user */ ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Profile</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profile Admin</h1>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <span class="glyphicon glyphicon-check"></span> <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <span class="glyphicon glyphicon-exclamation-sign"></span> <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profil</div>
                <div class="panel-body" style="padding: 25px;">
                    <form action="<?= base_url('admin/update-profile') ?>" method="post" enctype="multipart/form-data">
                        <div class="text-center" style="margin-bottom: 30px;">
                            <div style="margin-bottom: 15px;">
                                <?php if ($user['foto']) : ?>
                                    <img src="<?= base_url('uploads/profile/' . $user['foto']) ?>" class="img-circle" width="120" height="120" style="object-fit: cover; border: 4px solid #eee;" id="preview">
                                <?php else : ?>
                                    <div class="img-circle" style="width: 120px; height: 120px; background: #f9f9f9; line-height: 120px; margin: 0 auto; border: 1px solid #ddd;" id="preview_placeholder">
                                        <span class="glyphicon glyphicon-user" style="font-size: 60px; color: #ccc; vertical-align: middle;"></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <label for="foto" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-camera"></span> Ganti Foto
                            </label>
                            <input type="file" name="foto" id="foto" class="hide" onchange="previewImage(this)">
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= $user['nama_admin'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?= $user['email'] ?>" disabled>
                            <p class="help-block">Email tidak dapat diubah.</p>
                        </div>
                        <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input type="text" name="no_hp" class="form-control" value="<?= $user['no_hp'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3"><?= $user['alamat'] ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Ganti Password</div>
                <div class="panel-body" style="padding: 25px;">
                    <form action="<?= base_url('admin/ganti-password') ?>" method="post">
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required minlength="6">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="konfirmasi_password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-default btn-block">Update Password</button>
                    </form>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span> Informasi Akun</div>
                <div class="panel-body">
                    <p><strong>Role:</strong> Admin</p>
                    <p><strong>ID:</strong> <?= $user['id_admin'] ?></p>
                    <p><strong>Bergabung:</strong> <?= date('d M Y', strtotime($user['created_at'])) ?></p>
                </div>
            </div>
        </div>
    </div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('preview');
            var placeholder = document.getElementById('preview_placeholder');
            if (preview) {
                preview.src = e.target.result;
            } else if (placeholder) {
                var newImg = document.createElement('img');
                newImg.src = e.target.result;
                newImg.id = 'preview';
                newImg.className = 'img-circle';
                newImg.width = 120;
                newImg.height = 120;
                newImg.style.objectFit = 'cover';
                newImg.style.border = '4px solid #eee';
                placeholder.replaceWith(newImg);
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?= $this->include('backend/Template/footer'); ?>
