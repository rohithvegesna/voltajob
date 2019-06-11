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
		$isadmin = $_SESSION['IsAdmin'];
		$sessionid = $_SESSION['userID'];
	}
if($isadmin == 'Admin' && $isadmin != 'Agency' && $isadmin != 'Company'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Voltajob ~ Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
</head>
<body>

<div class="container">
  <div class="jumbotron text-center">
    <h1>Voltajob</h1> 
    <p>Csv Details.</p> 
  </div>
<form action="functions/print.php" method="post">
	<div class="form-group">
		<select class="form-control" name="typ" required>
			<option value="">Select</option>
			<option value="jobspdf">Jobs pdf</option>
			<option value="jobs">Jobs</option>
			<option value="connection">Connections</option>
			<option value="agency">Agencies</option>
			<option value="company">Companies</option>
		</select>
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="date" value="" required>
		<script type="text/javascript">
		$(function() {
			$('input[name="date"]').daterangepicker({
				locale: {
				  format: 'DD-MM-YYYY'
				}
			});
		});
		</script>
	</div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

</body>
</html>
<?php
}
?>