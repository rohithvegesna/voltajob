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
	$ticket = mysqli_real_escape_string($conn, $_GET['ticket']);
	
	if($isadmin != 'Admin' && $compid == null)
	{
		exit;die;
	}
	
	$sql = "UPDATE chatadm SET Status='2' WHERE Ticket='".$ticket."'";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed.";
	}
	else
	{
		header('Location: ../home.php?page=contact');
	}