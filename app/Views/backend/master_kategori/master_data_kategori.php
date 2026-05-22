<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Kategori Wisata</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Kategori Wisata</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="<?= base_url('admin/input-kategori'); ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Kategori
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
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataKategori)) : ?>
                                <?php $no = 1; foreach ($dataKategori as $kat) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $kat['id_kategori']; ?></td>
                                        <td><?= $kat['nama_kategori']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit-kategori/' . $kat['id_kategori']); ?>" 
                                               class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                            </a>
                                            <a href="#" onclick="hapusKategori('<?= $kat['id_kategori']; ?>')" 
                                               class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash"></span> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data kategori</td>
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
function hapusKategori(id) {
    swal({
        title: "Hapus Data?",
        text: "Data akan dihapus permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: false,
    })
    .then(ok => {
        if (ok) {
            window.location.href = '<?= base_url('admin/hapus-kategori/'); ?>' + id;
        }
    });
}
</script>

<?= $this->include('Backend/Template/footer'); ?>