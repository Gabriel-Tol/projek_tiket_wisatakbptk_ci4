<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

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
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Destinasi</th>
                                <th class="text-center" data-width="100">Jumlah Tiket</th>
                                <th data-width="140" class="text-right">Harga</th>
                                <th data-width="140" class="text-right">Subtotal</th>
                                <th data-width="130" class="text-center">Tgl Kunjungan</th>
                                <th data-width="100" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; foreach ($dataTemp as $temp) : ?>
                                <?php $subtotal = $temp['harga_tiket'] * $temp['jumlah_tiket']; $total += $subtotal; ?>
                                <tr>
                                    <td><?= $temp['nama_destinasi']; ?></td>
                                    <td class="text-center"><?= $temp['jumlah_tiket']; ?></td>
                                    <td class="text-right">Rp <?= number_format($temp['harga_tiket'], 0, ',', '.'); ?></td>
                                    <td class="text-right"><strong>Rp <?= number_format($subtotal, 0, ',', '.'); ?></strong></td>
                                    <td class="text-center"><?= $temp['tgl_kunjungan']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/hapus-temp/' . $temp['id_temp']); ?>" class="btn btn-danger btn-sm">
                                            <span class="glyphicon glyphicon-trash"></span> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                    <?php if (!empty($dataTemp)) : ?>
                        <a href="<?= base_url('admin/simpan-transaksi'); ?>" class="btn btn-success">Simpan Transaksi</a>
                    <?php endif; ?>
                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                    </a>
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
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Destinasi</th>
                                <th style="width:150px;">Kategori</th>
                                <th style="width:140px;" class="text-right">Harga</th>
                                <th style="width:80px;" class="text-center">Stok</th>
                                <th style="width:100px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataDestinasi as $des) : ?>
                                <tr>
                                    <td><?= $des['nama_destinasi']; ?></td>
                                    <td><span class="label label-info"><?= $des['nama_kategori']; ?></span></td>
                                    <td class="text-right">Rp <?= number_format($des['harga_tiket'], 0, ',', '.'); ?></td>
                                    <td class="text-center"><?= $des['stok_tiket']; ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah" 
                                                onclick="setDestinasi('<?= $des['id_destinasi']; ?>', '<?= $des['nama_destinasi']; ?>')">
                                            <span class="glyphicon glyphicon-plus"></span> Tambah
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

<?= $this->include('backend/Template/footer'); ?>