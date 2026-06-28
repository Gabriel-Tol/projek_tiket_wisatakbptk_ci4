<div class="container-fluid">
    <div class="row">
        <div id="sidebar-collapse" class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="<?= (service('uri')->getSegment(1) == 'dashboard') ? 'active' : ''; ?>">
                    <a href="<?= base_url('dashboard'); ?>"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
                </li>
            </ul>
            <ul class="nav nav-sidebar">
                <li class="<?= (service('uri')->getSegment(1) == 'admin' && service('uri')->getSegment(2) == 'master-kategori') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/master-kategori'); ?>"><i class="glyphicon glyphicon-th-list"></i> Kategori Wisata</a>
                </li>
                <li class="<?= (service('uri')->getSegment(1) == 'admin' && service('uri')->getSegment(2) == 'master-destinasi') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/master-destinasi'); ?>"><span class="glyphicon glyphicon-picture"></span>Destinasi</a>
                </li>
                <li class="<?= (service('uri')->getSegment(1) == 'admin' && service('uri')->getSegment(2) == 'master-pengunjung') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/master-pengunjung'); ?>"><span class="glyphicon glyphicon-user"></span>Pengunjung</a>
                </li>
            </ul>
            <ul class="nav nav-sidebar">
                <li class="<?= (service('uri')->getSegment(1) == 'admin' && service('uri')->getSegment(2) == 'master-transaksi') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/master-transaksi'); ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Transaksi</a>
                </li>
                <li class="<?= (service('uri')->getSegment(1) == 'admin' && service('uri')->getSegment(2) == 'laporan-pemesanan') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/laporan-pemesanan'); ?>"><span class="glyphicon glyphicon-print"></span> Laporan</a>
                </li>
            </ul>
            <ul class="nav nav-sidebar" style="margin-top: 20px;">
                <li style="padding: 0 15px 8px; font-size: 11px; text-transform: uppercase; color: #999; letter-spacing: 1px;">Akun</li>
                <li class="<?= (service('uri')->getSegment(1) == 'admin' && service('uri')->getSegment(2) == 'profile') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/profile'); ?>"><span class="glyphicon glyphicon-user"></span> Profile</a>
                </li>
                <li class="<?= (service('uri')->getSegment(1) == 'admin' && service('uri')->getSegment(2) == 'settings') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/settings'); ?>"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a>
                </li>
                <li>
                    <a href="<?= base_url('auth/logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">