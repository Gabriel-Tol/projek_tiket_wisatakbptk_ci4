<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login - Wisata CI4</title>

<link href="<?= base_url('Assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('Assets/css/styles.css') ?>" rel="stylesheet">

<!--[if lt IE 9]>
<script src="<?= base_url('Assets/js/html5shiv.js') ?>"></script>
<script src="<?= base_url('Assets/js/respond.min.js') ?>"></script>
<![endif]-->

<style>
	body {
		background: url('<?= base_url('Assets/bukit%20kelam.jpg') ?>') no-repeat center center fixed;
		background-size: cover;
		height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 0 !important;
		margin: 0;
	}
	.login-overlay {
		position: fixed;
		top: 0; left: 0; width: 100%; height: 100%;
		background: rgba(0, 0, 0, 0.45);
		z-index: -1;
	}
	.login-wrapper {
		width: 100%; max-width: 420px; padding: 20px; position: relative; z-index: 1;
	}
	.login-logo {
		text-align: center; margin-bottom: 30px; color: #fff; font-size: 36px;
		text-transform: uppercase; letter-spacing: 4px; text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
	}
	.login-logo span { color: #30a5ff; font-weight: 800; }
	.login-panel { background: rgba(255, 255, 255, 0.95); border-radius: 12px; overflow: hidden; border: none; }
	.panel-heading {
		background: #fff !important; color: #30a5ff !important; text-align: center;
		font-weight: 700; font-size: 20px; padding: 25px !important; border-bottom: 1px solid #eee !important;
	}
	.panel-body { padding: 35px 30px; }
	.form-group { margin-bottom: 25px; position: relative; }
	.form-control { height: 50px; border-radius: 6px; padding-left: 45px; }
	.form-group .glyphicon { position: absolute; left: 18px; top: 17px; color: #30a5ff; z-index: 2; font-size: 16px; }
	.btn-primary { width: 100%; padding: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; }
</style>
</head>
<body>
	<div class="login-overlay"></div>
	<div class="login-wrapper">
		<div class="login-logo"><span>WISATA</span>CI4</div>
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Visitor Login</div>
			<div class="panel-body">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert bg-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign"></span> <?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
				<form action="<?= base_url('auth/autentikasi'); ?>" method="post">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
                    </div>
                    <div class="form-group">
                        <span class="glyphicon glyphicon-lock"></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
				</form>
				<hr>
				<p class="text-center">Don't have an account? <a href="<?= base_url('auth/register') ?>">Register here</a></p>
			</div>
		</div>
	</div>
    <script src="<?= base_url('Assets/js/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>
