<?= $this->include('backend/Template/header'); ?>
<?= $this->include('backend/Template/sidebar'); ?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Ketersediaan Destinasi</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manajemen Ketersediaan</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <a href="<?= base_url('dashboard'); ?>" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                </a>
                <a href="<?= base_url('admin/input-availability'); ?>" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-plus"></span> Tambah Ketersediaan
                </a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:60px;" class="text-center">No</th>
                                <th>Destinasi</th>
                                <th style="width:150px;">Tanggal</th>
                                <th style="width:120px;" class="text-center">Kapasitas</th>
                                <th style="width:120px;" class="text-center">Terpesan</th>
                                <th style="width:160px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($availabilities)) : ?>
                                <?php $no = 1; foreach ($availabilities as $a) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $a['nama_destinasi'] ?? $a['destinasi_kode']; ?></td>
                                        <td><?= $a['date']; ?></td>
                                        <td class="text-center"><?= $a['capacity']; ?></td>
                                        <td class="text-center"><?= $a['booked']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/edit-availability/'.$a['id']); ?>" class="btn btn-warning btn-sm" style="color: white;">Edit</a>
                                            <a href="#" onclick="hapusAvailability('<?= $a['id']; ?>')" class="btn btn-danger btn-sm" style="color: white;">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data ketersediaan</td>
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
function hapusAvailability(id) {
    swal({
        title: "Hapus Ketersediaan?",
        text: "Data akan dihapus (soft-delete)",
        icon: "warning",
        buttons: true,
        dangerMode: false,
    })
    .then(ok => {
        if (ok) {
            window.location.href = '<?= base_url('admin/hapus-availability/'); ?>' + id;
        }
    });
}
</script>

<?= $this->include('backend/Template/footer'); ?>