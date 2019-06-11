<?php 
include_once('functions/db.php');
$blog = mysqli_real_escape_string($conn, $_GET['blog']);
		
	$sql = "SELECT * FROM blog WHERE ID=".$blog;
	$res = mysqli_query( $db, $sql );
	
	if( !is_bool($res) )
	{
		while($array = mysqli_fetch_array($res))
		{
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
	<meta property="og:site_name" content="Voltajob" />
	<meta property="og:image" content="<?php echo 'data:image/jpeg;base64,'.base64_encode( $array['Photo'] );?>" />
	<meta property="og:url" content="https://www.voltajob.com/" />
	<meta property="og:type" content="Blog" />
	<meta property="og:title" content="<?php echo $array['Title'];?>" />
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
	<!-- Blog header -->
	<header class="blogHeader" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode( $array['PhotoBG'] );?>');" data-top-bottom="background-position: 50% -130px;" data-bottom-top="background-position: 50% 130px;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center">
					<a href="blog.php" title="#" class="back btn-effect">
						<span class="sprite icon"></span> Back to Blog
					</a>
					<h1><?php echo $array['Title'];?></h1>

					<div class="info">
						<div class="wrap">
							<span class="sprite icon icon-calendar"></span>
							<div class="articleInfo text-left">
								<span class="sprite icon icon-calendar"></span>
								<div class="date"><?php echo date('jS F Y', $array['Doe'])?></div>
								<div class="author">By: <a href="#" title="#">Voltajob</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div class="blogContent">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-lg-2 authorInfoWrap">
					<div class="authorInfo">
						<img src="tmp/168x168.png" alt="#" width="168" height="168" class="img-responsive">
						<div class="info">
							<div class="div">Author: <a href="#" title="#" class="green"><strong>Voltajob</strong></a></div>
							<a href="contact.php" title="Contact" class="question green">Ask Question</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-9 col-lg-8 content">
					<div class="intro">
						<p><?php echo $array['Title'];?></p>
					</div>
					<div class="rte">
						<p><?php echo $array['Description'];?></p>
					</div>
				</div>
				<!-- <div class="visible-sm col-sm-1 col-lg-2 text-center backtoTop"> -->
				<div class="visible-lg text-center backtoTop js-backtoTop">
					<span class="icon sprite"></span>
					Back to top
				</div>
			</div>
		</div>
	</div>
	
	<!-- Footer -->
	<?php include 'footer.php';?>
	<!-- JS -->
	<script src="assets/js/jquery-1.11.2.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/waypoints.min.js"></script>
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
<?php }}?>