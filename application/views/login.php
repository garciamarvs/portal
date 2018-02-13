<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>UDM | Portal</title>
	<link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>assets/img/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>assets/img/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>assets/img/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>assets/img/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>assets/img/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>assets/img/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>assets/img/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/img/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?= base_url() ?>assets/img/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/img/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/img/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/icons/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url() ?>assets/img/icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?= base_url() ?>assets/img/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

	<link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>
<body class="gray-bg">
	<div style="background: url('<?= base_url()?>assets/img/header_two.png') no-repeat;background-position:center;background-size:50% 50%;height:100%;">
		<div class="loginColumns animated fadeInDown">
			<div class="row">
				<div class="col-md-6">
					<h2 class="font-bold">Welcome to UDM Portal</h2>

					<!-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.</p>

					<p>
						<small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
					</p> -->
				</div>
				<div class="col-md-6">
					<div class="ibox-content">
						<?php echo form_open('login', array('class' => 'm-t')); ?>
							<div class="form-group">
								<input name="username" type="text" class="form-control" placeholder="Username" required="" value="<?php if($this->session->flashdata('dump')){echo $this->session->flashdata('dump');} ?>">
							</div>
							<div class="form-group">
								<input name="password" type="password" class="form-control" placeholder="Password" required="">
							</div>
							<button type="submit" class="btn btn-primary block full-width m-b">Login</button>
							<?php echo form_close(); ?>

							<?php if($this->session->flashdata('login_failed')): ?>
								<?php echo '<div class="alert alert-danger"><i class="fa fa-warning"></i> '.$this->session->flashdata('login_failed').'</div>'; ?>
							<?php endif; ?>

							<a href="#">
								<small>Forgot password?</small>
							</a>
							<!-- <p class="text-muted text-center">
								<small>Do not have an account?</small>
							</p> -->						
						<!-- <p class="m-t">
								<small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
						</p> -->
					</div>
				</div>            
			</div>

			<hr/>

			<div class="row">
				<div class="col-md-6">
					Copyright
				</div>
				<div class="col-md-6 text-right">
					<small>© 2018</small>
				</div>
			</div>
		</div>
	</div>

</body>
</html>