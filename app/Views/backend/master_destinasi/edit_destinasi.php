<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="<?= base_url('admin/master-destinasi'); ?>">Destinasi Wisata</a></li>
            <li class="active">Edit Destinasi</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Destinasi Wisata</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Destinasi</div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <form action="<?= base_url('admin/update-destinasi'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_destinasi" value="<?= $destinasi['id_destinasi']; ?>">

                            <div class="form-group">
                                <label>Nama Destinasi</label>
                                <input type="text" name="nama_destinasi" class="form-control" 
                                       value="<?= $destinasi['nama_destinasi']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach ($dataKategori as $kat) : ?>
                                        <option value="<?= $kat['id_kategori']; ?>" 
                                            <?= ($kat['id_kategori'] == $destinasi['id_kategori']) ? 'selected' : ''; ?>>
                                            <?= $kat['nama_kategori']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" 
                                       value="<?= $destinasi['lokasi']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="4"><?= $destinasi['deskripsi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Harga Tiket</label>
                                <input type="number" name="harga_tiket" class="form-control" 
                                       value="<?= $destinasi['harga_tiket']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Stok Tiket</label>
                                <input type="number" name="stok_tiket" class="form-control" 
                                       value="<?= $destinasi['stok_tiket']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Foto Saat Ini</label><br>
                                <img src="/Assets/foto_destinasi/<?= $destinasi['foto']; ?>" 
                                     width="150px" style="margin-bottom:10px;">
                                <label>Ganti Foto (opsional)</label>
                                <input type="file" name="foto">
                                <p class="help-block">Kosongkan jika tidak ingin mengubah foto. Format JPG/PNG, maks 1 MB</p>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-save"></span> Update
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