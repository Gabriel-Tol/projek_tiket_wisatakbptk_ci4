<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wisata Kalbar</title>

    <link href="/Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Assets/css/datepicker3.css" rel="stylesheet">
    <link href="/Assets/css/styles.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link href="/Assets/css/sweetalert2.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/Assets/js/html5shiv.js"></script>
    <script src="/Assets/js/respond.min.js"></script>
    <![endif]-->

    <script>
        (function() {
            var theme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    <style id="dark-btn-fix">
        [data-theme="dark"] .btn-warning,
        [data-theme="dark"] .btn-danger,
        [data-theme="dark"] .btn-success,
        [data-theme="dark"] .btn-info {
            color: #fff !important;
            text-shadow: none !important;
            -webkit-text-fill-color: #fff !important;
        }
        [data-theme="dark"] .btn-warning *,
        [data-theme="dark"] .btn-danger *,
        [data-theme="dark"] .btn-success *,
        [data-theme="dark"] .btn-info * {
            color: #fff !important;
            -webkit-text-fill-color: #fff !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" id="sidebar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>Wisata</span>Kalbar</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right" style="display: flex; align-items: center; gap: 10px;">
                        <button id="darkModeToggle" class="btn btn-xs btn-default" title="Toggle Dark Mode" style="border: none; font-size: 16px;">
                            <span id="darkModeIcon">🌙</span>
                        </button>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> <?= session()->get('nama_admin'); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('admin/profile'); ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li><a href="<?= base_url('admin/settings'); ?>"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
                            <li><a href="<?= base_url('admin/logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>