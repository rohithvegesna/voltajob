<?php
	session_start();
	include_once('functions/db.php');
	$key = mysqli_real_escape_string($conn, $_GET['keye']);
	if(!isset($_SESSION['userName'])) { ?>
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
	<script src="assets/js/jquery-1.11.2.min.js"></script>

	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<script>
	function showUser() {
		var em = $('#em').val();
		if (em == "") {
			$('.input-label-content').css('color','red');
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				$("#form").hide();
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				$("#form").hide();
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","functions/forgotpass.php?em="+em,true);
			xmlhttp.send();
		}
	}
	</script>
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
			<?php if( $key != null ){ 
					$sql = "SELECT COUNT(*) FROM clients WHERE Keye='".$key."'";
					$res = mysqli_fetch_array(mysqli_query($conn, $sql));
					if( $res['COUNT(*)'] != 0 ){?>
			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
				<form class="loginRegistrationForm" action="functions/resetpass.php" method="post" autocomplete="off">
					<h1 class="text-center">New Password</h1>
					<div class="input">
						<input type="hidden" class="form-control input-field" name="keye" value="<?php echo $key;?>" required>
						<input type="password" class="form-control input-field" name="pass" id="pass" required>
						<label class="input-label">
							<span class="input-label-content">New Password</span>
						</label>
					</div>
					<div class="input">
						<input type="password" class="form-control input-field" id="pass1" required>
						<label class="input-label">
							<span class="input-label-content">Repeat New Password</span>
						</label>
					</div>
					<button type="submit" class="btn btn-lg btn-yellow btn-effect">Reset</button>
				</form>
			</div>
			<?php }else{echo "Please Conform your identity!!!!!!";}}else{ ?>
			<div id="txtHint" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
				<form class="loginRegistrationForm" id="form" autocomplete="off">
					<h1 class="text-center">Forgot Password</h1>
					<div class="input">
						<input type="email" class="form-control input-field" id="em" required>
						<label class="input-label">
							<span class="input-label-content">Email Address</span>
						</label>
					</div>
					<a onclick="showUser(this.value)" class="btn btn-lg btn-yellow btn-effect">Authorize</a>
				</form>
			</div>
			<?php } ?>
		</div>
	</div>
	
	<!-- JS -->
	<script src="assets/js/jquery-1.11.2.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/classie.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script>
	var password = document.getElementById("pass"),
	confirm_password = document.getElementById("pass1");

	function validatePassword(){
	  if(password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Passwords Don't Match");
	  } else if(!((password.value.length) >= 6)) {
		password.setCustomValidity("Password should be min 6 charecters");
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
<?php } else { echo header('Location: home.php');}
?>