<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

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
                <div class="panel-heading clearfix">
                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                    </a>
                    <a href="<?= base_url('admin/input-pengunjung'); ?>" class="btn btn-primary pull-right">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Pengunjung
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:60px;" class="text-center">No</th>
                                <th style="width:120px;">ID</th>
                                <th>Nama</th>
                                <th style="width:200px;">Email</th>
                                <th style="width:130px;">No HP</th>
                                <th>Alamat</th>
                                <th style="width:180px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataPengunjung)) : ?>
                                <?php $no = 1; foreach ($dataPengunjung as $p) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><code><?= $p['id_pengunjung']; ?></code></td>
                                        <td><?= $p['nama_pengunjung']; ?></td>
                                        <td><small class="text-muted"><?= $p['email']; ?></small></td>
                                        <td><?= $p['no_hp']; ?></td>
                                        <td><?= $p['alamat']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/edit-pengunjung/' . $p['id_pengunjung']); ?>" 
                                               class="btn btn-warning btn-sm" style="color: white;" title="Edit">
                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                            </a>
                                            <a href="#" onclick="hapusPengunjung('<?= $p['id_pengunjung']; ?>')" 
                                               class="btn btn-danger btn-sm" style="color: white;" title="Hapus">
                                                <span class="glyphicon glyphicon-trash"></span> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data pengunjung</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
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

<?= $this->include('backend/Template/footer'); ?>