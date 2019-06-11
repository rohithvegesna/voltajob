<?php
	session_start();
	if(!isset($_SESSION['eMail'])) { ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
</head>
<body class="loginPage">
	<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
	<div class="container">
		<a href="index.php" title="#" class="back btn-effect">
			<span class="sprite icon"></span> Back
		</a>
		
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
				<form class="loginRegistrationForm" action="functions/signin.php" method="post">
					<h1 class="text-center">Login</h1>
					<?php
						if(($_GET['msg'] != null) || ($_GET['msg'] != '')){
							if($_GET['msg'] == 1){$msg='Email or Password you have entered is wrong!!';$clr='danger';}
							else{$msg=$_GET['msg'];$clr='success';}
							echo '<div class="input">
										<div class="alert alert-'.$clr.'">'.$msg.'</div>
									</div>';
						}
					?>
					<div class="input">
						<input type="email" class="form-control input-field" name="em" required>
						<label class="input-label">
							<span class="input-label-content">Email Address</span>
						</label>
					</div>
					<div class="input">
						<input type="password" class="form-control input-field" name="pwd" required>
						<label class="input-label">
							<span class="input-label-content">Password</span>
						</label>
					</div>
					<a href="forgot.php" title="Forgot Pass" class="forgotPassword">Forgot your password?</a>
					<button type="submit" class="btn btn-lg btn-yellow btn-effect">Login</button>
				</form>
			</div>
		</div>
	</div>
	
	<!-- JS -->
	<script src="assets/js/jquery-1.11.2.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/classie.js"></script>
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
<?php } else { echo header('Location: home.php');}
?>