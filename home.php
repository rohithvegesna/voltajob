<?php
date_default_timezone_set('Asia/Kolkata');
	 session_start();
	if( !isset($_SESSION['eMail']) )
	{
		header('Location: functions/logout.php');die;exit;
	}
	
	else
	{
		$_SESSION['time'] = time();
		include "functions/db.php";
		$page = mysqli_real_escape_string($conn,$_GET['page']);
		if($page != null && $page != 'newjob' && $page != 'agencycontact' && $page != 'admincontact' && $page != 'profile' && $page != 'selectedjobs' && $page != 'posts' && $page != 'connection' && $page != 'contact' && $page != 'blog')
		{
			header("Location: error.php?note=".urlencode('The requested page was not found'));
		}
		$isadmin = $_SESSION['IsAdmin'];
		$sessionid = $_SESSION['userID'];
	}
?>
<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Voltajob</title>
	<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="./img/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSS -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/app.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
	
	<!-- Modernizr -->
	<script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	<!-- Google fonts -->
	<link href='//fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
	
	<!-- Core build with no theme, formatting, non-essential modules -->
	<link href="//cdn.quilljs.com/1.3.2/quill.core.css" rel="stylesheet">
	<script src="//cdn.quilljs.com/1.3.2/quill.core.js"></script>
	
	<!-- Main Quill library -->
	<script src="//cdn.quilljs.com/1.3.2/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.2/quill.min.js"></script>

	<!-- Theme included stylesheets -->
	<link href="//cdn.quilljs.com/1.3.2/quill.snow.css" rel="stylesheet">
	<link href="//cdn.quilljs.com/1.3.2/quill.bubble.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

	<style>
	#sidediv
	{
		padding: 15px;
		border-radius: 10px;
		z-index: 100;
		border: 1px solid rgb(113, 107, 107);
		position: fixed;
		top: 25%;
		left: 0;
		background: rgba(39, 40, 51, 0.965);
		
		/* background: -webkit-linear-gradient(rgba(39, 40, 51, 0.965), gold 90%); /* For Safari 5.1 to 6.0 */
		/* background: -o-linear-gradient(rgba(39, 40, 51, 0.965), gold 90%); /* For Opera 11.1 to 12.0 */
		/* background: -moz-linear-gradient(rgba(39, 40, 51, 0.965), gold 90%); /* For Firefox 3.6 to 15 */
		/* background: linear-gradient(rgba(39, 40, 51, 0.965), gold 90%); /* Standard syntax */			
	}			
	#sidediv > ul
	{
		list-style: none;
		padding:0;
		margin:0;
	}
	#sidediv > ul > li > a 
	{
		color:white;
		border-bottom: none;
	}
	#sidediv > ul > li
	{
		padding-bottom:1em;
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
	.dropdown-menu {
		overflow-y: scroll;
		height: 500%;
	}
	</style>
	<style>
		#notifier
		{
			display:none;
			position: absolute;
			top: 5%;		
			position: fixed;
			width: 100%;
			text-align: center;
			background-color: #f2f1f0;
			color: #0d3c55;
			border-radius: 5px;
			border: 1px black dotted;
			z-index: 100;
		}
	</style>
	<script>
		$(function() {
			var notifier = document.getElementById("notifier");
			if( notifier != null )
			{
				$('#notifier').show(500);
				setTimeout( function(){				
					$('#notifier').hide(500);
				}, 20000 );
			}
		});
	</script>
</head>
<body style="background:#f2f1f0;">
	<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
	<!-- Header -->
		<?php
			if( (isset($_SESSION['Message'])) && (($_SESSION['Message'] != null) || ($_SESSION['Message'] != '')) )
			{
				echo '<div id="notifier">'.$_SESSION['Message'].'</div>';
				unset($_SESSION['Message']);
			}
		?>
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
						<li><a href="home.php?page=profile" title="Profile"><i class="icon fa fa-cog"></i>Profile</a></li>
						<li class="login"><a href="functions/logout.php" title="Logout"><i class="icon fa fa-lock"></i>Logout</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="text-center">
				<h2 class="subpageTitle"><?php
					include_once "functions/db.php";
					$sql = "SELECT * FROM clients WHERE ID=".$sessionid;
					$res = mysqli_query( $db, $sql );
					
					if( !is_bool($res) )
					{
						while($array = mysqli_fetch_array($res))
						{
							echo $array['Company'];
						}
					}
				?></h2>
			</div>
		</div>
	</header>
	
	<div class="col" id="sidediv">
		<ul>
		<?php 
			if($isadmin == 'Company' && $isadmin != 'Agency' && $isadmin != 'Admin'){
				echo '
					<li><a href="home.php" title="Jobs"><i class="fa fa-briefcase fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="home.php?page=newjob" title="New Job"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="home.php?page=agencycontact" title="Agencies"><i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i></li>
					<li><a href="home.php?page=admincontact" title="Admin Contact"><i class="fa fa-podcast fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="functions/logout.php" title="Logout"><i class="fa fa-sign-out fa-2x fa-rotate-180" aria-hidden="true"></i></a></li>
				';}
			elseif($isadmin == 'Agency' && $isadmin != 'Company' && $isadmin != 'Admin'){
				echo '
					<li><a href="home.php" title="Jobs"><i class="fa fa-binoculars fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="home.php?page=selectedjobs" title="Selected Jobs"><i class="fa fa-briefcase fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="home.php?page=admincontact" title="Admin Contact"><i class="fa fa-podcast fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="functions/logout.php" title="Logout"><i class="fa fa-sign-out fa-2x fa-rotate-180" aria-hidden="true"></i></a></li>
				';}
			elseif($isadmin == 'Admin' && $isadmin != 'Company' && $isadmin != 'Agency'){
				echo '
					<li><a href="home.php" title="Clients"><i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="home.php?page=posts" title="Adds"><i class="fa fa-puzzle-piece fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="home.php?page=connection" title="Connections"><i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i></li>
					<li><a href="home.php?page=contact" title="Contact"><i class="fa fa-podcast fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="home.php?page=blog" title="Blog"><i class="fa fa-rss fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="print.php" title="Print" target="_blank"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></li>
					<li><a href="functions/logout.php" title="Logout"><i class="fa fa-sign-out fa-2x fa-rotate-180" aria-hidden="true"></i></a></li>
				';}?>
		</ul>
	</div>

<?php 
if($isadmin == 'Agency' || ($isadmin != 'Company' && $isadmin != 'Admin')){
	include_once "functions/db.php";
	$sql = "SELECT COUNT(*) FROM agencydes WHERE CompanyID=".$sessionid;
	$res = mysqli_query( $db, $sql );
	$array = mysqli_fetch_array($res);
	if($array['COUNT(*)'] == 0){
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#myModal").modal({
		backdrop: 'static',
		keyboard: false
	});
});
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Details</h4>
      </div>
      <div class="modal-body">
        <form id="spldet" action="functions/signup2.php" method="post">
			<div class="row" style="font-family: Lato, Helvetica, sans-serif; font-size: 18px;">
				<div class="col-sm-12 i">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="role">What kind of Roles you work primarily on ?</label>
							<select name="role" class="form-control" required>
								<option>Select</option>
								<option value="IT">IT</option>
								<option value="NONIT">NON - IT</option>
								<option value="BOTH">BOTH</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="position">Type of Positions you would prefer to work on</label>
							<select name="position" class="form-control" required>
								<option>Select</option>
								<option value="Permanent">Permanent</option>
								<option value="Contract">Contract</option>
								<option value="Both">Both</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-12 text-center"><br>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="level">Please select the Job level at which you had maximum closures</label><br>
							<select name="level[]" class="form-control mul" multiple="multiple" required>
								<option value="Entry Level">Entry Level</option>
								<option value="Mid Level">Mid Level</option>
								<option value="Senior/Executive Positions">Senior/Executive Positions</option>
								<option value="Leadership Roles">Leadership Roles</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="cat">Please select the Job skills at which you had maximum closures</label><br>
							<select name="cat[]" id="cate" class="form-control mul" multiple="multiple" required>
								<?php
									include_once "functions/db.php";
									$sql = "SELECT DISTINCT Cat FROM jobskills";
									$res = mysqli_query( $db, $sql );
									
									if( !is_bool($res) )
									{
										while($array = mysqli_fetch_array($res))
										{
											echo '<option value="'.$array['Cat'].'">'.$array['Cat'].'</option>';
										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-12"><br>
						<div class="form-group">
							<label for="ind">Please select your strengths in terms of Job Functions and Industries</label><br>
							<select name="ind[]" class="form-control mul" multiple="multiple" required>
								<?php
									include_once "functions/db.php";
									$sql = "SELECT DISTINCT Type FROM industry";
									$res = mysqli_query( $db, $sql );
									
									if( !is_bool($res) )
									{
										while($array = mysqli_fetch_array($res))
										{
											echo '<option value="'.$array['Type'].'">'.$array['Type'].'</option>';
										}
									}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="submit" class="btn btn-red submit btn-effect">Submit</button>
      </div>
	</form>
    </div>

  </div>
</div>
<?php
	}
}
?>
	
<?php 
if($isadmin == 'Company')
{
	include "functions/join/comp.php";
}
elseif($isadmin == 'Agency')
{
	include "functions/join/age.php";
}
elseif($isadmin == 'Admin')
{
	include "functions/join/adm.php";
}
?>

<?php 
if($page == 'admincontact'){
?>
	<!-- Admin Contact -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"> Admin <strong>Contact</strong></h2>

			<div class="listing row js-latestPosts">
			<?php
					include_once "functions/db.php";
					$sql = "SELECT DISTINCT Ticket FROM chatadm WHERE ChatFROM='".$sessionid."' OR ChatTO='".$sessionid."'";
					$res = mysqli_query( $db, $sql );
					
					if( !is_bool($res) )
					{
						while($array = mysqli_fetch_array($res))
						{
							$sql1 = "SELECT Ticket,ChatTO,ChatFROM,Status,Doe,MAX(Doe) FROM chatadm WHERE Ticket='".$array['Ticket']."' GROUP BY ID";
							$res1 = mysqli_query( $db, $sql1 );
							$array1 = mysqli_fetch_array($res1);
							if($array1['ChatTO'] == '1')
							{
								$client = $array1['ChatFROM'];
							}
							elseif($array1['ChatFROM'] == '1')
							{
								$client = $array1['ChatTO'];
							}
							if($array1['Status'] == '1')
							{
								$chatbtn = '<button type="submit" title="Chat" class="btn btn-lg btn-red btn-effect">'.$array1['Ticket'].'</button>';
							}
							elseif($array1['Status'] == '2')
							{
								$chatbtn = '<a class="btn btn-lg btn-success btn-effect">'.$array1['Ticket'].'</a>';
							}
							echo '<div class="col-xs-6 col-sm-4 i">
										<div class="c">
											<div class="wrapInfo">
												<h3>
												<form id="chat" action="chatadm.php" method="post" target="_blank">
													<input type="hidden" name="ticket" value="'.$array1['Ticket'].'">
													<input type="hidden" name="userto" value="'.$client.'">
													'.$chatbtn.'
												</form>
												</h3>
												<div class="info">
													<span class="sprite icon icon-calendar"></span>
													<div class="date">'.date('jS F Y', $array1['Doe']).'</div>
													<div class="date">'.date('H:i a', $array1['Doe']).'</div>
												</div>
											</div>
										</div>
									</div>';
						}
					}
				?>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-sm-offset-4">
					<a href="" data-toggle="modal" data-target="#myModaladm" title="New Querry" class="btn btn-lg btn-red btn-effect">New Query</a>
				</div>
			</div>
			<!-- Modal -->
			<div id="myModaladm" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New Ticket</h4>
				  </div>
				  <div class="modal-body">
					<form action="functions/admchat.php" method="post">
						<div class="form-group">
							<label for="email">Email address:</label>
							<?php
								do
								{
									$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
									$sql = "SELECT COUNT(*) FROM chatadm WHERE Ticket='$code'";
									$res = mysqli_fetch_array(mysqli_query($conn, $sql));
								}	
								while( $res['COUNT(*)'] != 0 );
							?>
							<input type="hidden" class="form-control" name="ticket" value="<?php echo $code;?>">
							<input type="hidden" class="form-control" name="comp" value="1">
							<input type="hidden" class="form-control" name="url" value="abc">
							<input type="text" class="form-control" name="msg">
						</div>
				  </div>
				  <div class="modal-footer">
						<button type="submit" title="Chat" class="btn btn-lg btn-red btn-effect">Chat</button>
					</form>
				  </div>
				</div>

			  </div>
			</div>
		</div>
	</div>
<?php 
}
?>

<?php 
if($page == 'profile'){
?>
	<!-- Admin Contact -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"><strong>Profile</strong></h2>

			<div class="mainForm js-contactForm">
				<div class="row">
				<?php
					include_once "functions/db.php";
					$sql = "SELECT * FROM clients WHERE ID=".$sessionid;
					$res = mysqli_query( $db, $sql );
					
					if( !is_bool($res) )
					{
						while($array = mysqli_fetch_array($res))
						{
							echo '<form action="functions/proupdate.php" method="post">
									<div class="col-xs-12 col-lg-12">
										<div class="row">
											<div class="col-sm-12 i">
												<div class="input">
													<input disabled="disabled" value="'.$array['Company'].'" class="form-control input-field">
													<label class="input-label">
														<span class="input-label-content">Company Name</span>
													</label>
												</div>
											</div>
											<div class="col-sm-12 i">
												<div class="input">
													<input disabled="disabled" value="'.$array['Email'].'" class="form-control input-field">
													<label class="input-label">
														<span class="input-label-content">Email</span>
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
														<span class="input-label-content">Conform Password</span>
													</label>
												</div>
											</div>
											<div class="col-xs-12 col-md-12 i">
												<div class="input">
													<input type="text" value="'.$array['FullName'].'" name="fname" class="form-control input-field" required>
													<label class="input-label">
														<span class="input-label-content">Contact Person</span>
													</label>
												</div>
											</div>
											<div class="col-xs-12 col-md-12 i">
												<div class="input">
													<input type="tel" value="'.$array['Mobile'].'" maxlength="10" name="mobile" class="form-control input-field" required>
													<label class="input-label">
														<span class="input-label-content">Phone</span>
													</label>
												</div>
											</div>
											<div class="col-xs-12 col-md-12 i">
												<div class="input">
													<input type="url" value="'.$array['Website'].'" name="url" class="form-control input-field" required>
													<label class="input-label">
														<span class="input-label-content">Company Website</span>
													</label>
												</div>
											</div>
											<div class="col-xs-12 i">
												<button type="submit" class="btn btn-red submit btn-effect">Update</button>
											</div>
										</div>
									</div>
								</form>';
						}
					}
				?>
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
	<script src="assets/js/classie.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/skrollr.min.js"></script>
	<script src="assets/js/jquery.doubletaptogo.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		 $(document).ready(function() {
			   $('.mul').multiselect({ 
				 includeSelectAllOption: true/* ,
				   enableFiltering:true */
			 });
		});
	</script>
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