<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

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
                <div class="panel-heading clearfix">
                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                    </a>
                    <a href="<?= base_url('admin/input-destinasi'); ?>" class="btn btn-primary pull-right">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Destinasi
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:60px;" class="text-center">No</th>
                                <th style="width:100px;" class="text-center">Foto</th>
                                <th>Nama Destinasi</th>
                                <th style="width:150px;">Kategori</th>
                                <th style="width:150px;">Lokasi</th>
                                <th style="width:130px;" class="text-right">Harga Tiket</th>
                                <th style="width:80px;" class="text-center">Stok</th>
                                <th style="width:180px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataDestinasi)) : ?>
                                <?php $no = 1; foreach ($dataDestinasi as $des) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center">
                                            <img src="/Assets/foto_destinasi/<?= $des['foto']; ?>" 
                                                 width="80" height="60" class="img-thumbnail" 
                                                 style="object-fit: cover;">
                                        </td>
                                        <td><?= $des['nama_destinasi']; ?></td>
                                        <td><span class="label label-info"><?= $des['nama_kategori']; ?></span></td>
                                        <td><?= $des['lokasi']; ?></td>
                                        <td class="text-right">Rp <?= number_format($des['harga_tiket'], 0, ',', '.'); ?></td>
                                        <td class="text-center"><?= $des['stok_tiket']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/edit-destinasi/'.$des['id_destinasi']); ?>" 
                                               class="btn btn-warning btn-sm" style="color: white;" title="Edit">
                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                            </a>
                                            <a href="#" onclick="hapusDestinasi('<?= $des['id_destinasi']; ?>')" 
                                               class="btn btn-danger btn-sm" style="color: white;" title="Hapus">
                                                <span class="glyphicon glyphicon-trash"></span> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Belum ada data destinasi</td>
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

<?= $this->include('backend/Template/footer'); ?>