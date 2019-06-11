<!DOCTYPE html>
<html class="no-js">
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
	<link rel="stylesheet" href="assets/css/hand.css">
	
	<!-- Modernizr -->
	<script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
	<script src="assets/js/jquery-1.11.2.min.js"></script>

	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<style>
	#preloader {
	  position: fixed;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #fff;
	  /* change if the mask should have another color then white */
	  z-index: 99;
	  /* makes sure it stays on top */
	}

	#status {
	  width: 200px;
	  height: 200px;
	  position: absolute;
	  left: 50%;
	  /* centers the loading animation horizontally one the screen */
	  top: 50%;
	  /* centers the loading animation vertically one the screen */
	  background-image: url('img/vsl.png');
	  /* path to your loading animation */
	  background-repeat: no-repeat;
	  background-position: center;
	  margin: -100px 0 0 -100px;
	  /* is width and height divided by two */
	}
	
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
	$(window).on('load', function() {
	  $('#status').fadeOut();
	  $('#preloader').fadeOut('slow');
	})
	</script>
	<script>
	function showUser() {
		var em = $('#em').val();
		var cat = $('#cat').val();
		if (em == "" || cat == "" || (em == "" && cat == "") ) {
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				$("#form").hide();
				$("#load").css("display", "");
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				$("#form").hide();
				$("#load").css("display", "");
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","functions/signup.php?em="+em+"&cat="+cat,true);
			xmlhttp.send();
		}
	}
	</script>
</head>
<body>
	<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!-- Header -->
	<header id="header" class="fullscreen" data-0="top: 0%;" data-400="top: -10%;">
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
						<li class="active">
							<a href="index.php" title="Home">Home</a>
						</li>
						<li><a href="about.php" title="How it works?">How it works?</a></li>
						<li><a href="blog.php" title="Blog">Blog</a></li>
						<li><a href="contact.php" title="Contact">Contact</a></li>
						<li class="login"><a href="login.php" title="Login"><i class="icon fa fa-lock"></i> Login</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="text-center wrap two-cols">
				<div class="row">
					<div class="col-xs-12 col-md-6 text">
						<h2>Companies <strong>meet</strong> Recruitment Agencies</h2>
						<h3>A platform where companies hire staffing agencies</h3>
					</div>
					<div id="txtHint" class="col-xs-12 col-md-5 col-md-offset-1 col-lg-4">
						<div id="load" style="display:none;" class="cssload-loading">
							<div class="cssload-finger cssload-finger-1">
								<div class="cssload-finger-item">
									<span></span><i></i>
								</div>
							</div>
							<div class="cssload-finger cssload-finger-2">
								<div class="cssload-finger-item">
									<span></span><i></i>
								</div>
							</div>
							<div class="cssload-finger cssload-finger-3">
								<div class="cssload-finger-item">
									<span></span><i></i>
								</div>
							</div>
							<div class="cssload-finger cssload-finger-4">
								<div class="cssload-finger-item">
									<span></span><i></i>
								</div>
							</div>
							<div class="cssload-last-finger">
								<div class="cssload-last-finger-item"><i></i></div>
							</div>
						</div>
						<!-- Form -->
						<form id="form" class="form loginRegistrationForm" autocomplete="off">
							<div class="row">
								<div class="col-xs-12 i">
									<div class="input">
										<input type="email" id="em" class="form-control input-field">
										<label class="input-label">
											<span class="input-label-content">Email Address</span>
										</label>
									</div>
								</div>
								<div class="col-xs-12 i">
									<div class="input">
										<input class="form-control input-field">
										<select style="color: black;" id="cat" class="form-control input-field">
											<option></option>
											<option value="Company">Company</option>
											<option value="Agency">Agency</option>
										</select>
										<label class="input-label">
											<span class="input-label-content">Select Company/Agency</span>
										</label>
									</div>
								</div>
								<div class="col-xs-12 i">
									<a onclick="showUser(this.value)" class="btn btn-lg btn-yellow btn-effect">Create my account</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Mouse -->
			<div class="mouse"></div>
		</div>
	</header>

	
	<!-- Features -->
	<section class="section features">
		<div class="container">
			<header class="text-center">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
						<h2>Broadcast your job openings to <strong>1000+ recruiters</strong></h2>
						<p>
							Companies post their current job openings. 1000+ recruiters view the job description. The recruiters who have the most suitable candidates contact companies. Recruiters place candidates. Companies pay recruiters directly or through Voltajob.
						</p>
					</div>
				</div>
			</header>
			<div class="row text-center">
				<div class="col-sm-4 i">
					<img src="img/icons/bookshelf.png" />
					<h3>
						<a href="#" title="#">Companies</a>
					</h3>
					<p>Sign up for free and Broadcast your job openings to <b>1000+ recruiters</b> who could fill your positions immediate.</p>
				</div>
				<div class="col-sm-4 i">
					<img src="img/icons/briefcase.png" />
					<h3>
						<a href="#" title="#">Recruitment Agencies</a>
					</h3>
					<p>Sign up as a recruiter partner for free, get <b>job requirements</b> from firms and place candidates.</p>
				</div>
				<div class="col-sm-4 i">
					<img src="img/icons/running.png" />
					<h3>
						<a href="#" title="#">Freelance Recruiters</a>
					</h3>
					<p>Sign up as a freelance recruiter for free, get job requirements from firms and place candidates.</p>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Functions -->
	<section class="section gray functions">
		<div class="container">
			<header class="text-center">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
						<h2>Hire <strong>smarter</strong> and faster</h2>
						<p>Find the best recruiter partner to fill a position. Some are specialized in sourcing sales candidates and others are specialized in sourcing technical staff. We connect you to the right Agency or freelance recruiter.</p>
					</div>
				</div>
			</header>
			
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="row js-screens-filter">
						<div class="col-sm-3 i">
							<a href="#tab-about-us" aria-controls="tab-about-us" role="tab" data-toggle="tab">
								<span class="sprite icon icon-about"></span>
							</a>
							<a href="#tab-about-us" aria-controls="tab-about-us" role="tab" data-toggle="tab" class="hoverExtend active">Job Posts</a>
						</div>
						<div class="col-sm-3 i">
							<a href="#tab-pricing-tables" aria-controls="tab-pricing-tables" role="tab" data-toggle="tab">
								<span class="sprite icon icon-pricing-tables"></span>
							</a>
							<a href="#tab-pricing-tables" aria-controls="tab-pricing-tables" role="tab" data-toggle="tab" class="hoverExtend">Agency Link</a>
						</div>
						<div class="col-sm-3 i">
							<a href="#tab-login" aria-controls="tab-login" role="tab" data-toggle="tab">
								<span class="sprite icon icon-login"></span>
							</a>
							<a href="#tab-login" aria-controls="tab-login" role="tab" data-toggle="tab" class="hoverExtend">Login</a>
						</div>
						<div class="col-sm-3 i">
							<a href="#tab-contact" aria-controls="tab-contact" role="tab" data-toggle="tab">
								<span class="sprite icon icon-contact"></span>
							</a>
							<a href="#tab-contact" aria-controls="tab-contact" role="tab" data-toggle="tab" class="hoverExtend">Contact</a>
						</div>
					</div>
					
					<div class="tab-content notebook">
						<!-- Notebook -->
						<img src="img/macbook.png" alt="#" width="968" height="510" class="img-responsive">
						
						<!-- Images -->
						<div role="tabpanel" class="tab-pane fade image in active" id="tab-about-us">
							<img src="tmp/jobs.jpg" alt="#" width="667" height="417" class="img-responsive">
						</div>
						<div role="tabpanel" class="tab-pane fade image" id="tab-pricing-tables">
							<img src="tmp/agency.jpg" alt="#" width="667" height="417" class="img-responsive">
						</div>
						<div role="tabpanel" class="tab-pane fade image" id="tab-contact">
							<img src="tmp/contact.jpg" alt="#" width="667" height="417" class="img-responsive">
						</div>
						<div role="tabpanel" class="tab-pane fade image" id="tab-login">
							<img src="tmp/login.jpg" alt="#" width="667" height="417" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Testimonials -->
	<div class="section testimonials">
		<div class="container">
			<header class="text-center">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
						<h2>Happy <strong>Customers</strong></h2>
					</div>
				</div>
			</header>

			<div class="row">
				<!-- User testimonials -->
				<div class="col-xs-12 col-sm-12 userTestimonials">
					<div class="js-testimonials-carousel">
						<div class="item">
							<div class="col-xs-10 col-xs-offset-1">
								<img src="tmp/80x80.jpg" alt="#" width="80" height="80" class="image">
								<h3>Maxin</h3>
								<h4>– MD, Powernet –</h4>
								<p>We had to source and deploy Industrial Electricians, Instrumentation Engs, Accountant, Purchase Manager, Receptionist, Civil Engineers, Sr Networking Engineer, and a Desktop Support Eng for a foreign subsidiary company in India. We posted our requirements on Voltajob. We got connected to three recruiting agencies, one was specialized in sourcing Industrial manpower, others were on IT Engs and Office admins. Surprisingly, we could fill all the positions within 14 days.</p>
							</div>
						</div>
						<div class="item">
							<div class="col-xs-10 col-xs-offset-1">
								<img src="tmp/80x80.jpg" alt="#" width="80" height="80" class="image">
								<h3>Maxin</h3>
								<h4>– MD, Powernet –</h4>
								<p>We had to source and deploy Industrial Electricians, Instrumentation Engs, Accountant, Purchase Manager, Receptionist, Civil Engineers, Sr Networking Engineer, and a Desktop Support Eng for a foreign subsidiary company in India. We posted our requirements on Voltajob. We got connected to three recruiting agencies, one was specialized in sourcing Industrial manpower, others were on IT Engs and Office admins. Surprisingly, we could fill all the positions within 14 days.</p>
							</div>
						</div>
						<div class="item">
							<div class="col-xs-10 col-xs-offset-1">
								<img src="tmp/80x80.jpg" alt="#" width="80" height="80" class="image">
								<h3>Maxin</h3>
								<h4>– MD, Powernet –</h4>
								<p>We had to source and deploy Industrial Electricians, Instrumentation Engs, Accountant, Purchase Manager, Receptionist, Civil Engineers, Sr Networking Engineer, and a Desktop Support Eng for a foreign subsidiary company in India. We posted our requirements on Voltajob. We got connected to three recruiting agencies, one was specialized in sourcing Industrial manpower, others were on IT Engs and Office admins. Surprisingly, we could fill all the positions within 14 days.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Twitter
				<div class="col-xs-12 col-sm-4 col-sm-offset-1 tweets js-tweets">
					<div class="item">
						<div class="i">
							<p>Amazing <span class="green"><strong>@acusammus</strong></span> theme lorem ipsum dolores! <span class="green"><strong>@CloudArena</strong></span> theme is great theme</p>
							<span class="time">Posted 13 hours ago</span>
						</div>
						<div class="i">
							<p>Cheers <span class="green"><strong>@jura_mol</strong></span> it's exciting to see people getting the most out of it!</p>
							<span class="time">Posted 22 hours ago</span>
						</div>
						<div class="i">
							<p>TOP <span class="green"><strong>@molnar</strong></span>: Making a new <span class="green"><strong>@CloudArena</strong></span> theme? <span class="green"><strong>@wrapbootstrap</strong></span> and lorem ipsum.</p>
							<span class="time">Posted 1 day ago</span>
						</div>
					</div>
					<div class="item">
						<div class="i">
							<p>Amazing <span class="green"><strong>@acusammus</strong></span> theme lorem ipsum dolores! <span class="green"><strong>@CloudArena</strong></span> theme is great theme</p>
							<span class="time">Posted 13 hours ago</span>
						</div>
						<div class="i">
							<p>Cheers <span class="green"><strong>@jura_mol</strong></span> it's exciting to see people getting the most out of it!</p>
							<span class="time">Posted 22 hours ago</span>
						</div>
						<div class="i">
							<p>TOP <span class="green"><strong>@molnar</strong></span>: Making a new <span class="green"><strong>@CloudArena</strong></span> theme? <span class="green"><strong>@wrapbootstrap</strong></span> and lorem ipsum.</p>
							<span class="time">Posted 1 day ago</span>
						</div>
					</div>
					<div class="item">
						<div class="i">
							<p>Amazing <span class="green"><strong>@acusammus</strong></span> theme lorem ipsum dolores! <span class="green"><strong>@CloudArena</strong></span> theme is great theme</p>
							<span class="time">Posted 13 hours ago</span>
						</div>
						<div class="i">
							<p>Cheers <span class="green"><strong>@jura_mol</strong></span> it's exciting to see people getting the most out of it!</p>
							<span class="time">Posted 22 hours ago</span>
						</div>
						<div class="i">
							<p>TOP <span class="green"><strong>@molnar</strong></span>: Making a new <span class="green"><strong>@CloudArena</strong></span> theme? <span class="green"><strong>@wrapbootstrap</strong></span> and lorem ipsum.</p>
							<span class="time">Posted 1 day ago</span>
						</div>
					</div>
				</div>-->
			</div>
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

	<!-- Business theme -->
	<!--<div class="section businessTheme">
		<div class="container text-center">
			<h2>Do you need beautiful business theme?</h2>
			<a href="#" title="#" class="btn btn-lg btn-yellow btn-effect">Purchase CloudArena <span>$15 only</span></a>
		</div>
	</div>-->

	<!-- Footer -->
	
	<?php include "footer.php";?>
	
	<!-- JS -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
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
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/59a42e434fe3a1168eada185/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
</body>
</html>