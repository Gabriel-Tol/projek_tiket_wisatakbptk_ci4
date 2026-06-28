<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Wisata CI4' ?></title>

    <link href="<?= base_url('Assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Assets/css/datepicker3.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Assets/css/styles.css') ?>" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="<?= base_url('Assets/js/html5shiv.js') ?>"></script>
    <script src="<?= base_url('Assets/js/respond.min.js') ?>"></script>
    <![endif]-->

    <script>
        (function() {
            var theme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    
    <?= $this->renderSection('styles') ?>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url() ?>"><span>WISATA</span>KALBAR</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right" style="display: flex; align-items: center; gap: 10px;">
                        <button id="darkModeToggle" class="btn btn-xs btn-default" title="Toggle Dark Mode" style="border: none; font-size: 16px;">
                            <span id="darkModeIcon">🌙</span>
                        </button>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> <?= session()->get('nama_pengunjung') ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('user/profile') ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li><a href="<?= base_url('auth/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li class="<?= url_is('user/dashboard*') ? 'active' : '' ?>">
                <a href="<?= base_url('user/dashboard') ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <li class="<?= url_is('destinasi*') ? 'active' : '' ?>">
                <a href="<?= base_url('destinasi') ?>"><span class="glyphicon glyphicon-map-marker"></span> Destinasi Wisata</a>
            </li>
            <li class="<?= url_is('user/riwayat*') ? 'active' : '' ?>">
                <a href="<?= base_url('user/riwayat') ?>"><span class="glyphicon glyphicon-list-alt"></span> Riwayat Pesanan</a>
            </li>
            <li class="<?= url_is('user/profile*') ? 'active' : '' ?>">
                <a href="<?= base_url('user/profile') ?>"><span class="glyphicon glyphicon-user"></span> Akun Saya</a>
            </li>
            <li>
                <a href="<?= base_url('auth/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>
        </ul>
    </div><!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">            
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active"><?= $title ?? 'Page' ?></li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $title ?? '' ?></h1>
            </div>
        </div><!--/.row-->
        
        <?= $this->renderSection('content') ?>
                                            
    </div>    <!--/.main-->

    <script src="<?= base_url('Assets/js/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('Assets/js/bootstrap-datepicker.js') ?>"></script>
    <script>
        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
        
        // Dark Mode Toggle
        var currentTheme = localStorage.getItem('theme') || 'light';
        
        function updateIcon(theme) {
            var icon = $('#darkModeIcon');
            if (theme === 'dark') {
                icon.text('☀️');
            } else {
                icon.text('🌙');
            }
        }
        
        updateIcon(currentTheme);
        
        $('#darkModeToggle').on('click', function() {
            var html = document.documentElement;
            var current = html.getAttribute('data-theme');
            var next = current === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
            updateIcon(next);
        });
    </script>    
    <?= $this->renderSection('scripts') ?>
</body>
</html>
