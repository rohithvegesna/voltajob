<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Voltajob</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<meta name="description" content="Voltajob an intelligent recruitment engine.">
	<meta name="keywords" content="Voltajob,job,jobs,volta,find,search,search jobs,recruitment,job post,voltajob.com">
	<meta name="author" content="Voltajob">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSS -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/app.min.css">
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	
	<!-- Modernizr -->
	<script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<style>
	.vlg {
		width: 40px;
		height: 40px;
		animation-name: beat;
		animation-duration: 5s;
		transform-origin: center;
		animation-iteration-count: infinite;
		animation-timing-function: linear;
	}

	/* Heart beat animation */
	@keyframes beat{
		/* to { transform: scale(1.4); } */
		0% { transform: scale(1); }
		30% { transform: scale(1); }
		45% { transform: scale(1.4); }
		50% { transform: scale(1); }
		55% { transform: scale(1.4); }
		70% { transform: scale(1); }
		80% { transform: scale(1); }
		100% { transform: scale(1); }
	}
	</style>
</head>
<body>
	<!-- Header -->
	<header id="header" class="subpage" data-0="top: 0%;" data-300="top: -10%;">
		<div class="container">
			<div class="navbar" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle visible-xs" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1 class="logo">
						<a href="index.php" title="Home"><img class="vlg" src="img/vwl.png" />olta<strong>Job</strong></a>
					</h1>
				</div>

				<nav class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.php" title="Home">Home</a>
						</li>
						<li><a href="about.php" title="How it works?">How it works?</a></li>
						<li><a href="blog.php" title="Blog">Blog</a></li>
						<li class="active"><a href="contact.php" title="Contact">Contact</a></li>
						<li class="login"><a href="login.php" title="Login"><i class="icon fa fa-lock"></i> Login</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="text-center">
				<h2 class="subpageTitle">Contact</h2>
			</div>
		</div>
	</header>

	<!-- Blockquote -->
	<div class="section">
		<div class="container">
			<div class="row text-center">
				<!--<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
					<blockquote class="blockquote-lg">Maecenas eget rhoncus nunc, vel maximus tellus. <strong>Curabitur eget</strong> nisi pellentesque, frin gilla neque ut, tempus arcu. <strong>Aliquam $10</strong> non bibendum quam. Quisque mauris est, fe ugiat vel vestibulum non, tincidunt ac mi. Duis tempus consequat tincidunt.</blockquote>
				</div> -->
			</div>
		</div>
	</div>

	<!-- Contact -->
	<div class="mainForm js-contactForm">
		<div class="container">
			<div class="row">
				<form>
					<div class="col-xs-12 col-lg-4 options">
						<label class="option active">
							<input type="radio" name="option" checked>
							<div class="wrap">
								<div class="name">Support</div>
								<div class="text">Select this option for support</div>
							</div>
							<span class="sprite icon icon-support"></span>
						</label>
						<label class="option">
							<input type="radio" name="option">
							<div class="wrap">
								<div class="name">Sales</div>
								<div class="text">Select this option for sales</div>
							</div>
							<span class="sprite icon icon-sales"></span>
						</label>
						<label class="option">
							<input type="radio" name="option">
							<div class="wrap">
								<div class="name">Feedback</div>
								<div class="text">Select this option for feedback</div>
							</div>
							<span class="sprite icon icon-hallo"></span>
						</label>
					</div>
					<div class="col-xs-12 col-lg-8">
						<div class="row">
							<div class="col-xs-12 col-md-6 i">
								<div class="input">
									<input type="text" class="form-control input-field" name="name" required>
									<label class="input-label">
										<span class="input-label-content">Name</span>
									</label>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 i">
								<div class="input">
									<input type="email" class="form-control input-field" name="email" required>
									<label class="input-label">
										<span class="input-label-content">Email</span>
									</label>
								</div>
							</div>
							<div class="col-xs-12 i">
								<div class="input textform">
									<textarea class="form-control input-field" name="msg" required></textarea>
									<label class="input-label">
										<span class="input-label-content">Message</span>
									</label>
								</div>
							</div>
							<div class="col-xs-12 i">
								<button type="submit" class="btn btn-red submit btn-effect">Send message</button>
							</div>
						</div>
					</div>
				</form>
			</div>

			<p class="text-center info">Bangalore, Karnataka, India, 560002. <a href="mailto:contact@voltajob.com">contact@voltajob.com</a></p>
		</div>
	</div>

	<!-- Footer -->
	<?php include "footer.php";?>
	
	<!-- JS -->
	<script src="assets/js/jquery-1.11.2.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/skrollr.min.js"></script>
	<script src="assets/js/classie.js"></script>
	<script src="assets/js/jquery.doubletaptogo.min.js"></script>
	<script src="assets/js/app.min.js"></script>

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
	<script>
	(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
	e=o.createElement(i);r=o.getElementsByTagName(i)[0];
	e.src='//www.google-analytics.com/analytics.js';
	r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	ga('create','UA-XXXXX-X');ga('send','pageview');
	</script> -->
</body>
</html>