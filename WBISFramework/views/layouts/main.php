<?php

use app\core\Application;
use app\controllers\AuthController;

if (isset($_GET)) {

	if (isset($_GET['logout']) && $_GET['logout'] == 1) {
		//return call_user_func([[new AuthController(),'logout'] ]);
	}
}
// var_dump($_SESSION);

$errors = Application::$app->session->getFlash('errors');
$user = Application::$app->session->getAuth('user');
if ($user !== false) {
	$params = $user;
}

if ($errors !== false) {
	$params->errors = $errors;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/font-awesome.min.css" rel="stylesheet">
	<link href="./css/prettyPhoto.css" rel="stylesheet">
	<!-- <link href="./css/price-range.css" rel="stylesheet"> -->
	<link href="./css/animate.css" rel="stylesheet">
	<link href="./css/main.css" rel="stylesheet">
	<link href="./css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="js/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<style type="text/css">
		/* Chart.js */
		@keyframes chartjs-render-animation {
			from {
				opacity: .99
			}

			to {
				opacity: 1
			}
		}

		.chartjs-render-monitor {
			animation: chartjs-render-animation 1ms
		}

		.chartjs-size-monitor,
		.chartjs-size-monitor-expand,
		.chartjs-size-monitor-shrink {
			position: absolute;
			direction: ltr;
			left: 0;
			top: 0;
			right: 0;
			bottom: 0;
			overflow: hidden;
			pointer-events: none;
			visibility: hidden;
			z-index: -1
		}

		.chartjs-size-monitor-expand>div {
			position: absolute;
			width: 1000000px;
			height: 1000000px;
			left: 0;
			top: 0
		}

		.chartjs-size-monitor-shrink>div {
			position: absolute;
			width: 200%;
			height: 200%;
			left: 0;
			top: 0
		}
	</style>
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="/images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<script src="js/jquery.js"></script>
	<script src="js/sweetalert2/sweetalert2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<!-- <script src="js/price-range.js"></script> -->
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>

</head>
<!--/head-->

<body>
	<header id="header">
		<!--header-->
		<div class="header_top">
			<!--header_top-->
			<div class="container">
				<div class="row">

					<div class="col-sm-6">
						<div class="social-icons pull-left">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://myaccount.google.com/intro/profile"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-6 col-sm-6-v">
						<div>
							<?php
							if (isset($_SESSION["is_ulogovan"])) {
								echo "<span style='color:#a0b1c5;'>Welcome, {$_SESSION['user']->username}! | Account balance: {$_SESSION['user']->account_balance} $ | <a href='/profile?user_id={$_SESSION['user']->user_id}'><div id=\"profile\" style=\"display: inline-block; width: 48px; height: 48px; border: 1.5px solid rgb(0,255,255);\"><img style=\"height: 100%; width: 100%;\" src='{$_SESSION['user']->avatar}' alt=\"?\"></div></a></span>";
							}

							?>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--/header_top-->

		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo pull-left">
							<a href="/index"><img src="images/home/logo.png" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-10">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

								<li><a href="/profile?user_id=<?php if (isset($_SESSION['is_ulogovan'])) {
																	echo $_SESSION['user']->user_id;
																} ?>"><i class="fa fa-user"></i> Account</a></li>
								<?php if ($user && ($user->role_name === 'Admin' || $user->role_name === 'SuperAdmin')) : ?>

									<li><a href="/adminPanel"><i class="fa fa-cog"></i> Administrator panel</a></li>

								<?php endif; ?>
								<?php if ($user && ($user->role_name === 'Admin' || $user->role_name === 'SuperAdmin')) : ?>

									<li><a href="/reports"><i class="fa fa-signal" aria-hidden="true"></i> Analytics</a></li>

								<?php endif; ?>
								<li><a href="/shoppingCart"><i class="fa fa-shopping-cart"></i> Cart </a></li>

								<?php if (isset($_SESSION["is_ulogovan"])) : ?>

									<li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>

								<?php else : ?>
									<li><a href="/register"><i class="fa fa-users"></i> Register</a></li>
									<li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>


								<?php endif ?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->

		<div class="header-bottom">
			<!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/home" class="active">Home</a></li>
								<li><a href="/products">Store</a></li>
								<li class="dropdown"><a>About<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="#">Company Info</a></li>
										<li><a href="#">FAQ</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="/products" method="GET">
								<input type="search" id="pretraga" name="search" placeholder="Search" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-bottom-->
	</header>
	<!--/header-->

	<section>
		<div class="container">
			<div class="row">
				{{ renderSection }}
			</div>
		</div>
	</section>

	<footer id="footer">
		<!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked" id="nav-footer">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="single-widget">
							<h2>About</h2>
							<ul class="nav nav-pills nav-stacked" id="nav-footer">
								<li><a href="#">Company Info</a></li>
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Partners</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 G4U Inc. All rights reserved.</p>
				</div>
			</div>
		</div>

	</footer>
	<!--/Footer-->
	<!-- ChartJS -->
	<script src="js/chart.js/Chart.min.js"></script>
</body>

</html>