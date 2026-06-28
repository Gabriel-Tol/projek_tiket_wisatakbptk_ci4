<?= $this->extend('visitor/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12" style="margin-bottom: 15px;">
        <a href="<?= base_url('user/dashboard'); ?>" class="btn btn-default">
            <span class="glyphicon glyphicon-arrow-left"></span> Kembali ke Dashboard
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= base_url('destinasi') ?>" method="get" class="form-inline">
                    <div class="form-group" style="margin-right: 10px; width: 40%;">
                        <div class="input-group" style="width: 100%;">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                            <input type="text" name="keyword" class="form-control" placeholder="Cari destinasi..." value="<?= $keyword ?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-right: 10px; width: 30%;">
                        <select name="kategori" class="form-control" style="width: 100%;">
                            <option value="">Semua Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori'] ?>" <?= $current_kategori == $k['id_kategori'] ? 'selected' : '' ?>>
                                    <?= $k['nama_kategori'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter & Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php if (empty($destinasi)) : ?>
        <div class="col-md-12 text-center" style="padding: 50px 0;">
            <span class="glyphicon glyphicon-search" style="font-size: 60px; color: #eee; margin-bottom: 20px;"></span>
            <h4 class="text-muted">Destinasi tidak ditemukan</h4>
            <p>Coba gunakan kata kunci atau kategori lain.</p>
        </div>
    <?php else : ?>
        <?php foreach ($destinasi as $row) : ?>
            <div class="col-md-4">
                <div class="panel panel-default destinasi-card">
                    <div style="position: relative;">
                        <img src="<?= base_url('Assets/foto_destinasi/' . $row['foto']) ?>" style="width: 100%; height: 200px; object-fit: cover;" alt="<?= $row['nama_destinasi'] ?>">
                        <span class="label label-primary" style="position: absolute; top: 10px; right: 10px; padding: 5px 10px;"><?= $row['nama_kategori'] ?></span>
                    </div>
                    <div class="panel-body">
                        <h4 style="margin-top: 0; font-weight: bold;"><?= $row['nama_destinasi'] ?></h4>
                        <p class="text-muted small"><span class="glyphicon glyphicon-map-marker" style="color: #f9243f;"></span> <?= $row['lokasi'] ?></p>
                        <p style="height: 60px; overflow: hidden; font-size: 13px;">
                            <?= strlen($row['deskripsi']) > 110 ? substr($row['deskripsi'], 0, 110) . '...' : $row['deskripsi'] ?>
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-xs-7">
                                <h4 style="margin: 5px 0; color: #30a5ff; font-weight: bold;">Rp <?= number_format($row['harga_tiket'], 0, ',', '.') ?></h4>
                            </div>
                            <div class="col-xs-5 text-right">
                                <a href="<?= base_url('user/destinasi/detail/' . $row['id_destinasi']) ?>" class="btn btn-primary btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="row text-center">
    <div class="col-md-12">
        <?= $pager->links('destinasi', 'bootstrap_pagination') ?>
    </div>
</div>

<style>
    .destinasi-card {
        transition: all 0.3s ease;
    }
    .destinasi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>
<?= $this->endSection() ?>
