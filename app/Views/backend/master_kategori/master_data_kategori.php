<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

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
                <div class="panel-heading clearfix">
                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                    </a>
                    <a href="<?= base_url('admin/input-kategori'); ?>" class="btn btn-primary pull-right">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Kategori
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:60px;" class="text-center">No</th>
                                <th style="width:120px;">ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th style="width:180px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataKategori)) : ?>
                                <?php $no = 1; foreach ($dataKategori as $kat) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><code><?= $kat['id_kategori']; ?></code></td>
                                        <td><?= $kat['nama_kategori']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/edit-kategori/' . $kat['id_kategori']); ?>" 
                                               class="btn btn-warning btn-sm" style="color: white;" title="Edit">
                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                            </a>
                                            <a href="#" onclick="hapusKategori('<?= $kat['id_kategori']; ?>')" 
                                               class="btn btn-danger btn-sm" style="color: white;" title="Hapus">
                                                <span class="glyphicon glyphicon-trash"></span> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada data kategori</td>
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

<?= $this->include('backend/Template/footer'); ?>