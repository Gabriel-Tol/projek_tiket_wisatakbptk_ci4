<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="<?= base_url('admin/master-transaksi'); ?>">Transaksi</a></li>
            <li class="active">Pilih Pengunjung</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Transaksi - Pilih Pengunjung</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Form Pilih Pengunjung</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form action="<?= base_url('admin/proses-step1'); ?>" method="post">
                            <div class="form-group">
                                <label>Pengunjung</label>
                                <select name="id_pengunjung" class="form-control" required>
                                    <option value="">-- Pilih Pengunjung --</option>
                                    <?php foreach ($dataPengunjung as $p) : ?>
                                        <option value="<?= $p['id_pengunjung']; ?>">
                                            <?= $p['nama_pengunjung']; ?> (<?= $p['email']; ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Lanjut</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('Backend/Template/footer'); ?>