<?php
include_once "functions/db.php";

$key = mysqli_real_escape_string($conn, $_GET['key']);
$em = mysqli_real_escape_string($conn, $_GET['email']);

	$sql = "SELECT * FROM clients WHERE Email = '".$em."' AND Keye = '".$key."'";
	$res = mysqli_query( $db, $sql );
	
	if( !is_bool($res) )
	{
		while($array = mysqli_fetch_array($res))
		{
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<title>Voltajob</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSS -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/app.min.css">
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	
	<!-- Modernizr -->
	<script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
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
	<script>
	$('#register').submit(function() {
		if ($.trim($("#fname").val()) === "" || $.trim($("#mobile").val()) === "" || $.trim($("#cname").val()) === "" || $.trim($("#password").val()) === "") {
			alert('you did not fill out one of the fields');
			return false;
		}
	});
	</script>
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
						<li class="sub"><a href="index.php" title="Home">Home</a></li>
						<li class="sub"><a href="about.php" title="About">About</a></li>
						<li><a href="pricing.php" title="Pricing">Pricing</a></li>
						<li><a href="blog.php" title="Blog">Blog</a></li>
						<li><a href="contact.php" title="Contact">Contact</a></li>
						<li class="login"><a href="login.php" title="Login"><i class="icon fa fa-lock"></i> Login</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="text-center">
				<h2 class="subpageTitle">Fill the rest</h2>
			</div>
		</div>
	</header>

	<!-- Icons listing -->
	<div class="mainForm js-contactForm">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
					<form id="register" action="functions/signup1.php" method="post">
						<div class="col-xs-12 col-md-12 i">
							<div class="input">
								<input type="text" disabled="disabled" value="<?php echo $array['IsAdmin'];?>" class="form-control input-field">
								<label class="input-label">
									<span class="input-label-content"></span>
								</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 i">
							<div class="input">
								<input type="hidden" name="key" value="<?php echo $array['Keye'];?>" class="form-control input-field">
								<input type="hidden" name="email" value="<?php echo $array['Email'];?>" class="form-control input-field">
								<input type="email" disabled="disabled" value="<?php echo $array['Email'];?>" class="form-control input-field">
								<label class="input-label">
									<span class="input-label-content"></span>
								</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 i">
							<div class="input">
								<input type="password" id="password" name="password" class="form-control input-field" required>
								<label class="input-label">
									<span class="input-label-content">Password</span>
								</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 i">
							<div class="input">
								<input type="password" id="passcnf" class="form-control input-field" required>
								<label class="input-label">
									<span class="input-label-content">Confirm Password</span>
								</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 i">
							<div class="input">
								<input type="text" id="fname" name="fname" class="form-control input-field" required>
								<label class="input-label">
									<span class="input-label-content">Contact Person</span>
								</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 i">
							<div class="input">
								<input type="tel" maxlength="10" id="mobile" name="mobile" class="form-control input-field" required>
								<label class="input-label">
									<span class="input-label-content">Phone</span>
								</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 i">
							<div class="input">
								<input type="text" id="cname" name="cname" class="form-control input-field" required>
								<label class="input-label">
									<span class="input-label-content">Company Name</span>
								</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 i">
							<div class="input">
								<input type="text" name="url" class="form-control input-field">
								<label class="input-label">
									<span class="input-label-content">Company Website</span>
								</label>
							</div>
						</div>
						<div class="col-xs-12 i">
							<button type="submit" class="btn btn-red submit btn-effect">Submit</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<!-- Footer -->
	<?php include "footer.php";?>
	
	<!-- JS -->
	<script src="assets/js/jquery-1.11.2.min.js"></script>
	<script src="assets/js/classie.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/waypoints.min.js"></script>
	<script src="assets/js/jquery.countTo.js"></script>
	<script src="assets/js/skrollr.min.js"></script>
	<script src="assets/js/jquery.doubletaptogo.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script>
		var password = document.getElementById("password"), confirm_password = document.getElementById("passcnf");

		function validatePassword(){
		  if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
			confirm_password.setCustomValidity('');
		  }
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	</script>

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
<?php
}}
?>