<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

$routes->get('/', 'Home::index');

// Add this line to handle the redirect from Auth/Admin controllers
$routes->get('/dashboard', 'Admin::dashboard');

// Authentication Routes
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/simpan_registrasi', 'Auth::simpan_registrasi');
$routes->post('/auth/autentikasi', 'Auth::autentikasi');
$routes->get('/auth/logout', 'Auth::logout');

// Public Destination Routes
$routes->get('/destinasi', 'Destinasi::index');
$routes->get('/destinasi/detail/(:any)', 'Destinasi::detail/$1');

// Booking Routes
$routes->group('booking', ['filter' => 'auth'], function($routes) {
    $routes->get('form/(:any)', 'Booking::form/$1');
    $routes->post('proses', 'Booking::proses');
    $routes->get('success/(:any)', 'Booking::success/$1');
    $routes->get('download_pdf/(:any)', 'Booking::download_pdf/$1');
});

// Visitor Dashboard Routes
$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('riwayat', 'Dashboard::riwayat');
    $routes->get('profile', 'Dashboard::profile');
    $routes->post('update_profile', 'Dashboard::update_profile');
    $routes->post('ganti_password', 'Dashboard::ganti_password');
});

// Admin Legacy Routes (Keep for compatibility)
$routes->get('/admin/login', 'Admin::login');
$routes->get('/admin/dashboard', 'Admin::dashboard');

// Kategori CRUD
$routes->get('/admin/master-kategori',          'Admin::master_kategori');
$routes->get('/admin/input-kategori',           'Admin::input_kategori');
$routes->post('/admin/simpan-kategori',         'Admin::simpan_kategori');
$routes->get('/admin/edit-kategori/(:any)',     'Admin::edit_kategori/$1');
$routes->post('/admin/update-kategori',         'Admin::update_kategori');
$routes->get('/admin/hapus-kategori/(:any)',    'Admin::hapus_kategori/$1');

// Destinasi CRUD
$routes->get('/admin/master-destinasi',        'Admin::master_destinasi');
$routes->get('/admin/input-destinasi',          'Admin::input_destinasi');
$routes->post('/admin/simpan-destinasi',        'Admin::simpan_destinasi');
$routes->get('/admin/edit-destinasi/(:any)',    'Admin::edit_destinasi/$1');
$routes->post('/admin/update-destinasi',        'Admin::update_destinasi');
$routes->get('/admin/hapus-destinasi/(:any)',   'Admin::hapus_destinasi/$1');

// Pengunjung CRUD
$routes->get('/admin/master-pengunjung',       'Admin::master_pengunjung');
$routes->get('/admin/input-pengunjung',        'Admin::input_pengunjung');
$routes->post('/admin/simpan-pengunjung',      'Admin::simpan_pengunjung');
$routes->get('/admin/edit-pengunjung/(:any)',  'Admin::edit_pengunjung/$1');
$routes->post('/admin/update-pengunjung',      'Admin::update_pengunjung');
$routes->get('/admin/hapus-pengunjung/(:any)', 'Admin::hapus_pengunjung/$1');

// Transaksi
$routes->get('/admin/master-transaksi',      'Admin::master_transaksi');
$routes->get('/admin/transaksi-step1',       'Admin::transaksi_step1');
$routes->post('/admin/proses-step1',          'Admin::proses_step1');
$routes->get('/admin/transaksi-step2',       'Admin::transaksi_step2');
$routes->post('/admin/tambah-temp',          'Admin::tambah_temp');
$routes->get('/admin/hapus-temp/(:any)',     'Admin::hapus_temp/$1');
$routes->get('/admin/simpan-transaksi',      'Admin::simpan_transaksi');

// Laporan Pemesanan
$routes->get('/admin/laporan-pemesanan',  'Admin::laporan_pemesanan');
$routes->post('/admin/filter-laporan',    'Admin::filter_laporan');