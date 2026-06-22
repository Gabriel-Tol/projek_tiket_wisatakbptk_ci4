<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="<?= base_url('admin/master-pengunjung'); ?>">Pengunjung</a></li>
            <li class="active">Tambah Pengunjung</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Pengunjung</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah Pengunjung</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form action="<?= base_url('admin/simpan-pengunjung'); ?>" method="post">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_pengunjung" class="form-control" 
                                       placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" 
                                       placeholder="Masukkan email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" 
                                       placeholder="Masukkan password" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control" 
                                       placeholder="Masukkan nomor HP">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" 
                                          placeholder="Masukkan alamat"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-save"></span> Simpan
                            </button>
                            <a href="<?= base_url('dashboard'); ?>" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/Template/footer'); ?>