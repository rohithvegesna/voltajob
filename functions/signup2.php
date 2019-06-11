<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
	if( !isset($_SESSION['eMail']) )
	{
		header('Location: logout.php');die;exit;
	}
	else
	{
		$_SESSION['time'] = time();
		$isadmin = $_SESSION['IsAdmin'];
		$sessionid = $_SESSION['userID'];
	}
	
	include_once('db.php'); 
	
	$compid = $sessionid;
	$role = mysqli_real_escape_string($conn, $_POST['role']);
	$pos = mysqli_real_escape_string($conn, $_POST['position']);
	$level = mysqli_real_escape_string($conn, implode(',', $_POST['level']));
	$cat = mysqli_real_escape_string($conn, implode(',', $_POST['cat']));
	$ind = mysqli_real_escape_string($conn, implode(',', $_POST['ind']));
	$time = time();
	
	if($isadmin != 'Agency')
	{
		exit;die;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS agencydes ( ID INT NOT NULL AUTO_INCREMENT, CompanyID TEXT, Role TEXT, Position TEXT, Level TEXT, Cat TEXT, Ind TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT into agencydes (`CompanyID`, `Role`, `Position`, `Level`, `Cat`, `Ind`, `Doe`) VALUES ('$compid', '$role', '$pos', '$level', '$cat', '$ind', '$time')";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed.";
	}
	else
	{
		header('Location: ../home.php');
	}