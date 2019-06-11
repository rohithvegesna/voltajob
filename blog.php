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
	<style>
	.vlg {
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
	function showUser(str) { 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET","functions/getpost.php?num="+str,true);
		xmlhttp.send();
	}
	</script>
</head>
<body style="background:#f2f1f0;">
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
						<li>
							<a href="index.php" title="Home">Home</a>
						</li>
						<li><a href="about.php" title="How it works?">How it works?</a></li>
						<li class="active"><a href="blog.php" title="Blog">Blog</a></li>
						<li><a href="contact.php" title="Contact">Contact</a></li>
						<li class="login"><a href="login.php" title="Login"><i class="icon fa fa-lock"></i> Login</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="text-center">
				<h2 class="subpageTitle">The Blog</h2>
			</div>
		</div>
	</header>

	<!-- Blockquote 
	<div class="section">
		<div class="container">
			<div class="row text-center">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
					<blockquote class="blockquote-lg">Maecenas eget rhoncus nunc, vel maximus tellus. <strong>Curabitur eget</strong> nisi pellentesque, frin gilla neque ut, tempus arcu. <strong>Aliquam $10</strong> non bibendum quam. Quisque mauris est, fe ugiat vel vestibulum non, tincidunt ac mi. Duis tempus consequat tincidunt.</blockquote>
				</div>
			</div>
		</div>
	</div>-->

	<!-- Blog posts -->
	<div class="section gray latestPosts">
		<div id="txtHint" class="container">
			<h2 class="text-center">Latest <strong>Posts</strong></h2>

			<div class="listing row js-latestPosts">
				<?php
					include_once('functions/db.php');
					$sql = "SELECT * FROM blog ORDER BY Doe DESC LIMIT 0,10";
					$res = mysqli_query( $db, $sql );
					
					if( !is_bool($res) )
					{
						while($array = mysqli_fetch_array($res))
						{
							echo '<div class="col-xs-6 col-sm-4 i">
									<div class="c">
										<a href="detail.php?blog='.$array['ID'].'" title="#">
											<img src="data:image/jpeg;base64,'.base64_encode( $array['Photo'] ).'" alt="#" width="370" height="280" class="img-responsive">
										</a>
										<div class="wrapInfo">
											<h3>
												<a href="detail.php?blog='.$array['ID'].'" title="Blog">'.$array['Title'].'</a>
											</h3>
											<div class="info">
												<span class="sprite icon icon-calendar"></span>
												<div class="date">'.date('jS F Y', $array['Doe']).'</div>
												<div class="author">By: <a href="detail.php?blog='.$array['ID'].'" title="#">Voltajob</a></div>
											</div>
										</div>
									</div>
								</div>';
						}
					}
				?>
			</div>
			<?php
				include_once('functions/db.php');
				$sql = "SELECT COUNT(*) FROM blog";
				$res = mysqli_query( $db, $sql );
				$array = mysqli_fetch_array($res);
				if( $array['COUNT(*)'] >= 11 )
				{
					echo '<div class="row">
								<div class="col-xs-12 col-sm-4 col-sm-offset-4">
									<a onclick="showUser(10)" title="#" class="btn btn-lg btn-red btn-effect">+ 10 more posts...</a>
								</div>
							</div>';
				}
			?>
		</div>
	</div>
	
	<!-- Clients
	<section class="section clients">
		<div class="container">
			<header class="text-center">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
						<h2>Clients</h2>
						<p>Decent listing with your clients. Fully customizable and ready to use in any subpages as you want. Responsive for any numbers of clients in this section.</p>
					</div>
				</div>
			</header>

			<div class="row">
				<div class="col-xs-4 col-md-2 i">
					<a href="#" title="#">
						<img src="tmp/clients/digiapple.png" alt="#" width="69" height="102" class="img-responsive">
					</a>
				</div>
				<div class="col-xs-4 col-md-2 i">
					<a href="#" title="#">
						<img src="tmp/clients/backhorse-digital.png" alt="#" width="106" height="119">
					</a>
				</div>
				<div class="col-xs-4 col-md-2 i">
					<a href="#" title="#">
						<img src="tmp/clients/veagle-technologies.png" alt="#" width="117" height="106">
					</a>
				</div>
				<div class="col-xs-4 col-md-2 i">
					<a href="#" title="#">
						<img src="tmp/clients/coffetwist.png" alt="#" width="77" height="106">
					</a>
				</div>
				<div class="col-xs-4 col-md-2 i">
					<a href="#" title="#">
						<img src="tmp/clients/diagonal.png" alt="#" width="128" height="87">
					</a>
				</div>
				<div class="col-xs-4 col-md-2 i">
					<a href="#" title="#">
						<img src="tmp/clients/t-crowd.png" alt="#" width="75" height="103">
					</a>
				</div>
			</div>
		</div>
	</section> -->

	<!-- Footer -->
	<?php include 'footer.php';?>
	
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