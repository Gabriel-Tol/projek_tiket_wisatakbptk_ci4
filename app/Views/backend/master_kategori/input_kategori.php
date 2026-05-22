<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="<?= base_url('admin/master-kategori'); ?>">Kategori Wisata</a></li>
            <li class="active">Tambah Kategori</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Kategori Wisata</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah Kategori</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form action="<?= base_url('admin/simpan-kategori'); ?>" method="post">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" 
                                       placeholder="Masukkan nama kategori" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-save"></span> Simpan
                            </button>
                            <a href="<?= base_url('admin/master-kategori'); ?>" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span> Batal
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('Backend/Template/footer'); ?>