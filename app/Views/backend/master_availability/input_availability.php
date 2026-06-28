<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Tambah Ketersediaan</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Form Tambah Ketersediaan</div>
            <div class="panel-body">
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <form action="<?= base_url('admin/simpan-availability'); ?>" method="post">
                    <div class="form-group">
                        <label>Destinasi</label>
                        <select name="destinasi_kode" class="form-control" required>
                            <option value="">-- Pilih Destinasi --</option>
                            <?php foreach($destinasi as $d): ?>
                                <option value="<?= $d['id_destinasi'] ?>"><?= $d['nama_destinasi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kapasitas</label>
                        <input type="number" name="capacity" class="form-control" min="0" value="0" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('admin/master-availability'); ?>" class="btn btn-default">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/Template/footer'); ?>