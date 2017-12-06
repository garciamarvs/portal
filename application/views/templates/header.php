<?php
$fname = $this->session->userdata('fname');
$mname = $this->session->userdata('mname');
$lname = $this->session->userdata('lname');
switch ($this->session->userdata('usertype')) {
	case '1':
		$usertype = 'Student';
		break;
	
	default:
		$usertype = 'not yet assigned';
		break;
}
?>

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
<body>
	<div id="wrapper">
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav metismenu" id="side-menu">
					<li class="nav-header">
						<div class="dropdown profile-element">
							<!-- <span><img alt="image" class="img-circle" src="img/profile_small.jpg"></span> -->
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="clear"><span class="block m-t-xs"><strong class="font-bold"><?= $fname.' '.$mname.' '.$lname ?></strong></span><span class="text-muted text-xs block"><?= $usertype ?><b class="caret"></b></span></span></a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="profile.html">Profile</a></li>
								<li><a href="contacts.html">Contacts</a></li>
								<li><a href="mailbox.html">Mailbox</a></li>
								<li class="divider"></li>
								<li><a href="<?= base_url()?>home/logout">Logout</a></li>
							</ul>
						</div>
						<div class="logo-element"><img src="<?= base_url()?>assets/img/Universidad_de_Manila_Logo.png" width="32" height="32"></div>
					</li>
					<li>
						<a href="<?= base_url()?>evaluate"><i class="fa fa-pencil-square"></i> <span class="nav-label">Evaluate</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Enroll</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-book"></i> <span class="nav-label">View Grades</span></a>
					</li>
				</ul>
			</div>
		</nav>

		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i></a>
						<h2 class="inline"> UDM Portal </h2>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<a href="<?= base_url()?>home/logout">
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
					</ul>
				</nav>
			</div>
