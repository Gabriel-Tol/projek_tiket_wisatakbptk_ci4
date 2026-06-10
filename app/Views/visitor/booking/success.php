<?= $this->extend('visitor/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="alert bg-success" role="alert" style="color: #fff; padding: 25px; margin-bottom: 30px; border: none;">
            <span class="glyphicon glyphicon-ok-sign" style="font-size: 30px; margin-right: 15px; vertical-align: middle;"></span>
            <div style="display: inline-block; vertical-align: middle;">
                <h4 style="margin: 0; font-weight: bold;">Pemesanan Berhasil!</h4>
                <p style="margin: 5px 0 0 0; opacity: 0.9;">Tiket digital Anda telah diterbitkan. Silakan simpan sebagai bukti masuk.</p>
            </div>
        </div>

        <div class="panel panel-default" style="box-shadow: 0 5px 25px rgba(0,0,0,0.1); border: none; overflow: hidden;">
            <div class="row no-padding">
                <div class="col-md-8" style="padding: 30px; border-right: 1px dashed #ddd;">
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-xs-6">
                            <p class="text-muted small"><strong>NOMOR BOOKING</strong></p>
                            <h3 style="margin: 0; color: #30a5ff; font-weight: bold;"><?= $transaksi['no_transaksi'] ?></h3>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="text-muted small"><strong>STATUS</strong></p>
                            <?php $labelClass = ($transaksi['status'] === 'Berhasil') ? 'label-success' : 'label-warning'; ?>
                            <span class="label <?= $labelClass ?>" style="padding: 8px 15px; font-size: 12px;"><?= strtoupper($transaksi['status']) ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6" style="margin-bottom: 20px;">
                            <p class="text-muted small"><strong>PENGUNJUNG</strong></p>
                            <p><strong><?= $transaksi['nama_pengunjung'] ?></strong></p>
                        </div>
                        <div class="col-xs-6" style="margin-bottom: 20px;">
                            <p class="text-muted small"><strong>DESTINASI</strong></p>
                            <p><strong><?= $transaksi['nama_destinasi'] ?></strong></p>
                        </div>
                        <div class="col-xs-6" style="margin-bottom: 20px;">
                            <p class="text-muted small"><strong>TANGGAL KUNJUNGAN</strong></p>
                            <p><strong><?= date('d F Y', strtotime($transaksi['tanggal_kunjungan'])) ?></strong></p>
                        </div>
                        <div class="col-xs-6" style="margin-bottom: 20px;">
                            <p class="text-muted small"><strong>JUMLAH TIKET</strong></p>
                            <p><strong><?= $transaksi['jumlah_tiket'] ?? 0 ?> Orang</strong></p>
                        </div>
                    </div>

                    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-xs-6"><p class="text-muted" style="font-size: 16px;">Total Pembayaran</p></div>
                            <div class="col-xs-6 text-right"><h3 style="margin: 0; font-weight: bold;">Rp <?= number_format($transaksi['total_bayar'], 0, ',', '.') ?></h3></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="<?= base_url('booking/download_pdf/' . $transaksi['no_transaksi']) ?>" class="btn btn-primary" style="padding: 10px 25px; border-radius: 50px;">
                                    <span class="glyphicon glyphicon-download-alt"></span> Download PDF
                                </a>
                                <button onclick="window.print()" class="btn btn-default" style="padding: 10px 25px; border-radius: 50px; margin-left: 10px;">
                                    <span class="glyphicon glyphicon-print"></span> Cetak Tiket
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center" style="background: #fbfcfd; padding: 40px 20px;">
                    <div style="background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: inline-block;">
                        <img src="<?= base_url($transaksi['qr_code']) ?>" width="180">
                    </div>
                    <p class="text-muted small" style="margin-top: 20px;">Scan QR Code ini di gerbang masuk</p>
                    <h4 style="font-weight: bold;"><?= $transaksi['no_transaksi'] ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        .sidebar, .navbar, .breadcrumb, .btn, .alert {
            display: none !important;
        }
        .main {
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .panel {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }
    }
</style>
<?= $this->endSection() ?>
