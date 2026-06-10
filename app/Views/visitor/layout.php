<!DOCTYPE html>
<html>
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
                <a class="navbar-brand" href="<?= base_url() ?>"><span>WISATA</span>CI4</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
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
    </script>    
    <?= $this->renderSection('scripts') ?>
</body>
</html>
