<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="<?= base_url('admin/master-transaksi'); ?>">Transaksi</a></li>
            <li class="active">Keranjang</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Keranjang Transaksi</h1>
        </div>
    </div>

    <!-- Keranjang -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Item di Keranjang</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Destinasi</th>
                                <th>Jumlah Tiket</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Tgl Kunjungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; foreach ($dataTemp as $temp) : ?>
                                <?php $subtotal = $temp['harga_tiket'] * $temp['jumlah_tiket']; $total += $subtotal; ?>
                                <tr>
                                    <td><?= $temp['nama_destinasi']; ?></td>
                                    <td><?= $temp['jumlah_tiket']; ?></td>
                                    <td>Rp <?= number_format($temp['harga_tiket'], 0, ',', '.'); ?></td>
                                    <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                                    <td><?= $temp['tgl_kunjungan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/hapus-temp/' . $temp['id_temp']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (!empty($dataTemp)) : ?>
                        <a href="<?= base_url('admin/simpan-transaksi'); ?>" class="btn btn-success">Simpan Transaksi</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Destinasi -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Destinasi</div>
                <div class="panel-body">
                    <table data-toggle="table" 
                           data-search="true" 
                           data-pagination="true" 
                           data-loading-template=""
                           class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Destinasi</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataDestinasi as $des) : ?>
                                <tr>
                                    <td><?= $des['nama_destinasi']; ?></td>
                                    <td><?= $des['nama_kategori']; ?></td>
                                    <td>Rp <?= number_format($des['harga_tiket'], 0, ',', '.'); ?></td>
                                    <td><?= $des['stok_tiket']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah" 
                                                onclick="setDestinasi('<?= $des['id_destinasi']; ?>', '<?= $des['nama_destinasi']; ?>')">
                                            Tambah
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah ke Keranjang -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/tambah-temp'); ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah ke Keranjang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_destinasi" id="idDestinasi">
                    <p id="namaDestinasi"></p>
                    <div class="form-group">
                        <label>Jumlah Tiket</label>
                        <input type="number" name="jumlah_tiket" class="form-control" required min="1">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kunjungan</label>
                        <input type="date" name="tgl_kunjungan" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function setDestinasi(id, nama) {
    document.getElementById('idDestinasi').value = id;
    document.getElementById('namaDestinasi').innerText = 'Destinasi: ' + nama;
}
</script>

<?= $this->include('Backend/Template/footer'); ?>