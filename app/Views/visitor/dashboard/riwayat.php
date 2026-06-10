<?= $this->extend('visitor/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Riwayat Pemesanan Tiket</div>
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="margin-bottom: 0;">
                        <thead>
                            <tr>
                                <th style="padding-left: 20px;">No. Booking</th>
                                <th>Destinasi Wisata</th>
                                <th>Tgl Kunjungan</th>
                                <th>Jml Tiket</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th class="text-right" style="padding-right: 20px;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($riwayat)) : ?>
                                <tr>
                                    <td colspan="7" class="text-center" style="padding: 40px 0;">
                                        <span class="glyphicon glyphicon-list-alt" style="font-size: 50px; color: #eee;"></span>
                                        <p class="text-muted">Belum ada pemesanan tiket.</p>
                                        <a href="<?= base_url('destinasi') ?>" class="btn btn-primary btn-sm">Cari Destinasi</a>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($riwayat as $row) : ?>
                                    <tr>
                                        <td style="padding-left: 20px;">
                                            <strong><?= $row['no_transaksi'] ?></strong>
                                            <br><small class="text-muted"><?= isset($row['created_at']) ? date('d/m/Y H:i', strtotime($row['created_at'])) : '' ?></small>
                                        </td>
                                        <td><?= $row['nama_destinasi'] ?></td>
                                        <td><?= date('d M Y', strtotime($row['tanggal_kunjungan'])) ?></td>
                                        <td><?= $row['jumlah_tiket'] ?? 0 ?> Org</td>
                                        <td><strong>Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?></strong></td>
                                        <td>
                                            <?php 
                                                $labelClass = 'label-warning';
                                                if ($row['status'] == 'Berhasil') $labelClass = 'label-success';
                                                if ($row['status'] == 'Dibatalkan') $labelClass = 'label-danger';
                                            ?>
                                            <span class="label <?= $labelClass ?>"><?= strtoupper($row['status']) ?></span>
                                        </td>
                                        <td class="text-right" style="padding-right: 20px;">
                                            <div class="btn-group">
                                                <a href="<?= base_url('booking/success/' . $row['no_transaksi']) ?>" class="btn btn-default btn-sm" title="Detail">
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </a>
                                                <?php if ($row['status'] == 'Berhasil') : ?>
                                                    <a href="<?= base_url('booking/download_pdf/' . $row['no_transaksi']) ?>" class="btn btn-primary btn-sm" title="Download Tiket">
                                                        <span class="glyphicon glyphicon-download-alt"></span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
