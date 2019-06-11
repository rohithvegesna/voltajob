<?php
	 session_start();
	if( !isset($_SESSION['eMail']) )
	{
		header('Location: functions/logout.php');die;exit;
	}
	
	if( isset($_SESSION['eMail']) && ( (time() - $_SESSION['time']) >= 5*60 ))
	{
		header('Location: functions/logout.php');
	}
	else
	{
		$_SESSION['time'] = time();
		include "functions/db.php";
		$job = mysqli_real_escape_string($conn,$_GET['job']);
		$isadmin = $_SESSION['IsAdmin'];
		$sessionid = $_SESSION['userID'];
		if($isadmin != 'Agency')
		{
			header("Location: home.php");exit;die;
		}
	}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Voltajob - Buy</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<meta name="description" content="">
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
						<li class="login"><a href="functions/logout.php" title="Logout"><i class="icon fa fa-lock"></i>Logout</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="text-center">
				<h2 class="subpageTitle">Pricing</h2>
			</div>
		</div>
	</header>

	<!-- Blockquote -->
	<div class="section">
		<div class="container">
			<div class="row text-center">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
					<blockquote class="blockquote-lg">
						Voltajob functions as a lead generation engine. We offer you the following pricing models.
						Pay us Rs.2050 and get the contact details of this company, work with them and get paid directly. Once you buy this lead, we don’t sell this lead to any other agencies.
						Pay us 15 percent of the total amount you receive from the client. In this model, we work with you and the company, collect the agreed amount from the company and transfer the amount to your bank. We take 15 % of the total amount as our commission.
					</blockquote>
				</div>
			</div>
		</div>
	</div>
<?php if($job == 'noted') {?>
	<!-- Pricing tables -->
	<div class="pricingTables">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 i active">
					<div class="c">
						<div class="head">Contact Details</div>
						<div class="info">
							Email:<a href="mailto:justin@voltajob.com">justin@voltajob.com</a><br />
							<a href="tel:+919964420605">+919964420605</a><br />
							Please contact for further process<br />
							Theses details have been sent to you by mail
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
<?php }
else{?>
	<!-- Pricing tables -->
	<div class="pricingTables">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-6 i active">
					<div class="c">
						<div class="head">Lumpsum Plan</div>
						<div class="price">
							2050 <sup>₹</sup> <span>/ lead</span>
						</div>
						<div class="info">
							Pay <strong>Rs.2050</strong> to get the contact details of the company<br />
							<strong>Contact company directly</strong><br />
							Sign on your own agreement for placement with the company<br />
							Source candidates and get paid directly
						</div>
						<div class="btnWrap">
							<form id="form1" action="functions/connection.php" method="post">
								<input type="hidden" class="form-control" name="job" value="<?php echo $job;?>">
								<input type="hidden" class="form-control" name="plan" value="Lumpsum">
								<a onclick="$('#form1').submit();" class="btn btn-gray">Accept</a>
							</form>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-6 i active">
					<div class="c">
						<div class="head">Percentage Plan</div>
						<div class="price">
							15 <sup>%</sup> <span>/ lead</span>
						</div>
						<div class="info">
							Pay Voltajob a fee after the successful placement<br />
							<strong>Contact the company through Voltajob</strong><br />
							Source candidates and get paid through Voltajob<br />
							Voltajob's fee would be 15% of the total amount
						</div>
						<div class="btnWrap">
							<form id="form2" action="functions/connection.php" method="post">
								<input type="hidden" class="form-control" name="job" value="<?php echo $job;?>">
								<input type="hidden" class="form-control" name="plan" value="Percentage">
								<a onclick="$('#form2').submit();" class="btn btn-gray">Accept</a>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
<?php }?>
	<!-- Footer -->
	
	<?php include "footer.php";?>
	
	<!-- JS -->
	<script src="assets/js/jquery-1.11.2.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/skrollr.min.js"></script>
	<script src="assets/js/jquery.doubletaptogo.min.js"></script>
	<script src="assets/js/app.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
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