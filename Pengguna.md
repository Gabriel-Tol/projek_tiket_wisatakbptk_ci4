Saya sedang mengembangkan aplikasi web "Sistem Informasi Pemesanan Tiket Wisata" menggunakan CodeIgniter 4, Bootstrap (Template Lumino), MySQL, dan arsitektur MVC.

Kondisi saat ini:

* Landing Page sudah selesai.
* Login Admin sudah selesai.
* CRUD Destinasi Wisata sudah selesai.
* CRUD Kategori Wisata sudah selesai.
* CRUD Pengunjung sudah selesai.
* Upload Foto Destinasi sudah selesai.
* Dashboard Admin sudah selesai.
* Laporan Pemesanan sudah selesai.

Sekarang saya ingin membuat fitur sisi User/Pengunjung agar dapat melakukan pemesanan tiket wisata secara online.

Buatkan fitur lengkap berikut:

=================================================
MODUL USER / PENGUNJUNG
=======================

1. Registrasi Akun Pengunjung
   Field:

* Nama Lengkap
* Email
* Nomor HP
* Alamat
* Password
* Konfirmasi Password

Fitur:

* Validasi form
* Enkripsi password
* Cek email unik
* Login otomatis setelah registrasi

=================================================

2. Login Pengunjung
   Field:

* Email
* Password

Fitur:

* Session login
* Remember me
* Logout

=================================================

3. Dashboard Pengunjung
   Menampilkan:

* Jumlah tiket yang pernah dipesan
* Jumlah transaksi berhasil
* Riwayat pemesanan terbaru
* Profil pengguna

=================================================

4. Halaman Daftar Destinasi
   Menampilkan:

* Foto destinasi
* Nama destinasi
* Lokasi
* Deskripsi singkat
* Harga tiket
* Tombol Detail

Fitur:

* Search destinasi
* Filter kategori wisata
* Pagination

=================================================

5. Halaman Detail Destinasi
   Menampilkan:

* Foto destinasi
* Nama wisata
* Lokasi
* Deskripsi lengkap
* Harga tiket
* Jam operasional
* Fasilitas
* Tombol Pesan Tiket

=================================================

6. Form Pemesanan Tiket
   Field:

* Nomor Booking (Auto Generate)
* Nama Pemesan
* Email
* Nomor HP
* Destinasi Wisata
* Tanggal Kunjungan
* Jumlah Tiket
* Harga Tiket
* Total Bayar

Fitur:

* Hitung otomatis total pembayaran
* Validasi stok tiket
* Simpan transaksi

Rumus:
Total Bayar = Harga Tiket × Jumlah Tiket

=================================================

7. QR Code Tiket
   Setelah transaksi berhasil:

* Generate QR Code otomatis
* QR berisi nomor booking
* QR tersimpan di database
* QR tampil pada tiket digital

=================================================

8. Tiket Digital
   Menampilkan:

* Nomor Booking
* Nama Pemesan
* Destinasi
* Tanggal Kunjungan
* Jumlah Tiket
* Total Bayar
* QR Code

Fitur:

* Download PDF
* Cetak Tiket

=================================================

9. Riwayat Pemesanan
   Menampilkan:

* Nomor Booking
* Destinasi
* Tanggal Kunjungan
* Jumlah Tiket
* Total Bayar
* Status

Fitur:

* Detail transaksi
* Download ulang tiket
* Cetak ulang tiket

=================================================

10. Profil Pengguna
    Fitur:

* Edit Profil
* Ganti Password
* Upload Foto Profil

=================================================

DATABASE YANG DIPERLUKAN

Tabel Users

* id_user
* nama
* email
* no_hp
* alamat
* foto
* password
* role
* created_at

Tabel Pemesanan

* id_pemesanan
* kode_booking
* id_user
* id_destinasi
* tanggal_kunjungan
* jumlah_tiket
* harga_tiket
* total_bayar
* qr_code
* status
* created_at

=================================================

STATUS TRANSAKSI

* Menunggu Pembayaran
* Diproses
* Berhasil
* Dibatalkan

=================================================

OUTPUT YANG SAYA INGINKAN

1. Struktur folder MVC lengkap.
2. Migration database.
3. Model.
4. Controller.
5. Routes.
6. Views Bootstrap 5.
7. Validasi form.
8. Session login user.
9. Generate QR Code.
10. Export PDF tiket.
11. Kode lengkap yang siap dijalankan di CodeIgniter 4.

Gunakan coding best practice CodeIgniter 4 dan Bootstrap 5 dengan tampilan modern, responsive, dan user friendly.
