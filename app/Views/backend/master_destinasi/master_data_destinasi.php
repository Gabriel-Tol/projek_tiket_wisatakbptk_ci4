<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Destinasi Wisata</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Destinasi Wisata</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="<?= base_url('admin/input-destinasi'); ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Destinasi
                    </a>
                </div>
                <div class="panel-body">
                    <table data-toggle="table" 
                           data-search="true" 
                           data-pagination="true" 
                           data-page-size="10"
                           data-page-list="[10, 25, 50]"
                           data-loading-template=""
                           class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Destinasi</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Harga Tiket</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataDestinasi)) : ?>
                                <?php $no = 1; foreach ($dataDestinasi as $des) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <img src="/Assets/foto_destinasi/<?= $des['foto']; ?>" 
                                                 width="80px" height="60px" style="object-fit: cover;">
                                        </td>
                                        <td><?= $des['nama_destinasi']; ?></td>
                                        <td><?= $des['nama_kategori']; ?></td>
                                        <td><?= $des['lokasi']; ?></td>
                                        <td>Rp <?= number_format($des['harga_tiket'], 0, ',', '.'); ?></td>
                                        <td><?= $des['stok_tiket']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit-destinasi/'.$des['id_destinasi']); ?>" 
                                               class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-edit"></span>Edit
                                            </a>
                                            <a href="#" onclick="hapusDestinasi('<?= $des['id_destinasi']; ?>')" 
                                               class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash"></span>Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada data destinasi</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function hapusDestinasi(id) {
    swal({
        title: "Hapus Data?",
        text: "Data akan dihapus permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: false,
    })
    .then(ok => {
        if (ok) {
            window.location.href = '<?= base_url('admin/hapus-destinasi/'); ?>' + id;
        }
    });
}
</script>

<?= $this->include('Backend/Template/footer'); ?>