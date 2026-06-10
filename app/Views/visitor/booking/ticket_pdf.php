<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tiket Digital - <?= $transaksi['no_transaksi'] ?></title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .ticket { border: 2px solid #30a5ff; border-radius: 10px; overflow: hidden; max-width: 600px; margin: 0 auto; }
        .header { background: #30a5ff; color: #fff; padding: 20px; text-align: center; }
        .content { padding: 30px; position: relative; }
        .info-row { margin-bottom: 20px; }
        .label { font-size: 12px; color: #777; font-weight: bold; text-transform: uppercase; margin-bottom: 5px; }
        .value { font-size: 16px; font-weight: bold; }
        .footer { background: #f9f9f9; padding: 20px; text-align: center; border-top: 1px dashed #ddd; }
        .qr-section { margin-top: 20px; text-align: center; }
        .qr-code { width: 150px; }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h1 style="margin: 0; font-size: 24px;">WISATA KALBAR</h1>
            <p style="margin: 5px 0 0 0; opacity: 0.8;">E-Ticket / Bukti Pemesanan</p>
        </div>
        <div class="content">
            <table width="100%">
                <tr>
                    <td width="50%">
                        <div class="info-row">
                            <div class="label">Nomor Booking</div>
                            <div class="value" style="color: #30a5ff; font-size: 20px;"><?= $transaksi['no_transaksi'] ?></div>
                        </div>
                    </td>
                    <td width="50%" align="right">
                        <div class="info-row">
                            <div class="label">Status</div>
                            <div class="value" style="color: #8ad919;">BERHASIL</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="info-row">
                            <div class="label">Destinasi Wisata</div>
                            <div class="value"><?= $transaksi['nama_destinasi'] ?></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="info-row">
                            <div class="label">Nama Pemesan</div>
                            <div class="value"><?= $transaksi['nama_pengunjung'] ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="info-row">
                            <div class="label">Tanggal Kunjungan</div>
                            <div class="value"><?= date('d F Y', strtotime($transaksi['tanggal_kunjungan'])) ?></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="info-row">
                            <div class="label">Jumlah Tiket</div>
                            <div class="value"><?= $transaksi['jumlah_tiket'] ?? 0 ?> Orang</div>
                        </div>
                    </td>
                    <td>
                        <div class="info-row">
                            <div class="label">Total Bayar</div>
                            <div class="value">Rp <?= number_format($transaksi['total_bayar'], 0, ',', '.') ?></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <div class="qr-section">
                <img src="<?= FCPATH . 'Assets/qrcode/' . $transaksi['qr_code'] ?>" class="qr-code">
                <p style="margin-top: 10px; font-size: 12px; color: #777;">Tunjukkan QR Code ini kepada petugas di lokasi wisata.</p>
            </div>
            <p style="font-size: 10px; color: #999; margin-top: 20px;">Diterbitkan pada: <?= date('d/m/Y H:i') ?> | &copy; Wisata CI4</p>
        </div>
    </div>
</body>
</html>
