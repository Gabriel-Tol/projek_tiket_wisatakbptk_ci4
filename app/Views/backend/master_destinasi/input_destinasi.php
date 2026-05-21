<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="<?= base_url('admin/master-destinasi'); ?>">Destinasi Wisata</a></li>
            <li class="active">Tambah Destinasi</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Destinasi Wisata</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah Destinasi</div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <form action="<?= base_url('admin/simpan-destinasi'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Destinasi</label>
                                <input type="text" name="nama_destinasi" class="form-control" 
                                       placeholder="Masukkan nama destinasi" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach ($dataKategori as $kat) : ?>
                                        <option value="<?= $kat['id_kategori']; ?>"><?= $kat['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" 
                                       placeholder="Masukkan lokasi" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="4" 
                                          placeholder="Masukkan deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Harga Tiket</label>
                                <input type="number" name="harga_tiket" class="form-control" 
                                       placeholder="Masukkan harga tiket" required>
                            </div>
                            <div class="form-group">
                                <label>Stok Tiket</label>
                                <input type="number" name="stok_tiket" class="form-control" 
                                       value="0" required>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" required>
                                <p class="help-block">Format JPG/PNG, maks 1 MB</p>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-save"></span> Simpan
                            </button>
                            <a href="<?= base_url('admin/master-destinasi'); ?>" class="btn btn-default">
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