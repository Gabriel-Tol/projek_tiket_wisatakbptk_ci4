<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Pengaturan</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pengaturan Aplikasi</h1>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <span class="glyphicon glyphicon-check"></span> <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Pengaturan Umum</div>
                <div class="panel-body" style="padding: 25px;">
                    <form action="<?= base_url('admin/update-settings') ?>" method="post">
                        <div class="form-group">
                            <label>Nama Aplikasi</label>
                            <input type="text" name="nama_aplikasi" class="form-control" value="<?= $nama_aplikasi ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Aplikasi</label>
                            <textarea name="deskripsi_aplikasi" class="form-control" rows="3"><?= $deskripsi_aplikasi ?? '' ?></textarea>
                        </div>

                        <h4 style="margin-top: 30px; padding-bottom: 10px; border-bottom: 1px solid #eee;">Informasi Kontak</h4>

                        <div class="form-group" style="margin-top: 15px;">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="2"><?= $alamat ?? '' ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" name="telepon" class="form-control" value="<?= $telepon ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Kontak</label>
                                    <input type="email" name="email_kontak" class="form-control" value="<?= $email_kontak ?? '' ?>">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-save"></span> Simpan Pengaturan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?= $this->include('backend/Template/footer'); ?>
