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
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Pemesanan</div>
            <div class="panel-body">
                <?php if (session()->get('errors')) : ?>
                    <div class="alert bg-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign"></span>
                        <ul style="display: inline-block; margin-bottom: 0; vertical-align: top; padding-left: 15px;">
                        <?php foreach (session()->get('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('booking/proses') ?>" method="post">
                    <input type="hidden" name="id_destinasi" value="<?= $destinasi['id_destinasi'] ?>">
                    
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6">
                            <label class="small text-muted"><strong>NAMA PEMESAN</strong></label>
                            <input type="text" class="form-control" value="<?= $user['nama_pengunjung'] ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted"><strong>EMAIL</strong></label>
                            <input type="text" class="form-control" value="<?= $user['email'] ?>" disabled>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6">
                            <label class="small text-muted"><strong>NOMOR HP</strong></label>
                            <input type="text" class="form-control" value="<?= $user['no_hp'] ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted"><strong>DESTINASI</strong></label>
                            <input type="text" class="form-control" value="<?= $destinasi['nama_destinasi'] ?>" disabled>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-md-6">
                            <label><strong>Tanggal Kunjungan</strong></label>
                            <input type="date" name="tanggal_kunjungan" class="form-control" min="<?= date('Y-m-d') ?>" value="<?= old('tanggal_kunjungan') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label><strong>Jumlah Tiket</strong></label>
                            <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control" min="1" max="100" value="<?= old('jumlah_tiket') ?? 1 ?>" required>
                        </div>
                    </div>

                    <div class="well" style="background: #f9f9f9; padding: 25px; border: 1px dashed #ddd;">
                        <div class="row">
                            <div class="col-xs-6 text-muted">Harga per Tiket</div>
                            <div class="col-xs-6 text-right"><strong>Rp <?= number_format($destinasi['harga_tiket'], 0, ',', '.') ?></strong></div>
                        </div>
                        <div class="row" style="margin-top: 10px; padding-top: 10px; border-top: 1px solid #eee;">
                            <div class="col-xs-6"><h4><strong>Total Bayar</strong></h4></div>
                            <div class="col-xs-6 text-right"><h3 id="total_bayar" style="margin: 0; color: #30a5ff; font-weight: bold;">Rp <?= number_format($destinasi['harga_tiket'], 0, ',', '.') ?></h3></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="padding: 15px;">
                        Konfirmasi & Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <img src="<?= base_url('Assets/foto_destinasi/' . $destinasi['foto']) ?>" class="img-thumbnail" style="margin-bottom: 15px;" alt="<?= $destinasi['nama_destinasi'] ?>">
                <h4 style="font-weight: bold;"><?= $destinasi['nama_destinasi'] ?></h4>
                <p class="text-muted small"><span class="glyphicon glyphicon-map-marker"></span> <?= $destinasi['lokasi'] ?></p>
            </div>
        </div>
        <div class="alert bg-success" style="color: #fff;">
            <span class="glyphicon glyphicon-shield" style="font-size: 20px; margin-right: 10px; vertical-align: middle;"></span>
            <strong>Transaksi Aman</strong><br>
            <span class="small">Data Anda dienkripsi secara aman.</span>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const inputJumlah = document.getElementById('jumlah_tiket');
    const displayTotal = document.getElementById('total_bayar');
    const harga = <?= $destinasi['harga_tiket'] ?>;

    inputJumlah.addEventListener('input', function() {
        const jumlah = this.value || 0;
        const total = harga * jumlah;
        displayTotal.innerText = 'Rp ' + total.toLocaleString('id-ID');
    });
</script>
<?= $this->endSection() ?>
