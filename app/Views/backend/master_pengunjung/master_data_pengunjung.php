<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Pengunjung</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Pengunjung</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="<?= base_url('admin/input-pengunjung'); ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Pengunjung
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
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataPengunjung)) : ?>
                                <?php $no = 1; foreach ($dataPengunjung as $p) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p['id_pengunjung']; ?></td>
                                        <td><?= $p['nama_pengunjung']; ?></td>
                                        <td><?= $p['email']; ?></td>
                                        <td><?= $p['no_hp']; ?></td>
                                        <td><?= $p['alamat']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit-pengunjung/' . $p['id_pengunjung']); ?>" 
                                               class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                            </a>
                                            <a href="#" onclick="hapusPengunjung('<?= $p['id_pengunjung']; ?>')" 
                                               class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash"></span> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data pengunjung</td>
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
function hapusPengunjung(id) {
    swal({
        title: "Hapus Data?",
        text: "Data akan dihapus permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: false,
    })
    .then(ok => {
        if (ok) {
            window.location.href = '<?= base_url('admin/hapus-pengunjung/'); ?>' + id;
        }
    });
}
</script>

<?= $this->include('Backend/Template/footer'); ?>