<?php
error_reporting(0);
include "functions/db.php";
$note = mysqli_real_escape_string($conn,urldecode($_GET['note']));
?>
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
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	
	<!-- Modernizr -->
	<script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
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
						<li><a href="index.php" title="Home">Home</a></li>
						<li><a href="about.php" title="How it works?">How it works?</a></li>
						<li><a href="blog.php" title="Blog">Blog</a></li>
						<li><a href="contact.php" title="Contact">Contact</a></li>
						<li class="login"><a href="login.php" title="Login"><i class="icon fa fa-lock"></i> Login</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="text-center">
				<h2 class="subpageTitle">MESSAGE</h2>
			</div>
		</div>
	</header>
	
<?php 
if($note != null){
?>
	<!-- Posted Jobs -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/megaphone.png" alt="" width="64" height="64"><strong>Message</strong></h2>

			<div class="listing row js-latestPosts">
				<div class="col-xs-12 col-sm-12 i">
					<div class="c">
						<div class="wrapInfo text-center">
							<h3><?php echo $note;?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
}
?>
	<!-- Footer -->
	
	<?php include "footer.php";?>
	
	<!-- JS -->
	<script src="assets/js/jquery-1.11.2.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/skrollr.min.js"></script>
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