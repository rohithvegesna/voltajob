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

	if($isadmin != 'Admin')
	{
		exit;die;
	}
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$em = mysqli_real_escape_string($conn, $_POST['email']);
	$name = mysqli_real_escape_string($conn, $_POST['fn']);
	$mobile = mysqli_real_escape_string($conn, $_POST['phone']);
	$cname = mysqli_real_escape_string($conn, $_POST['cn']);
	$url = mysqli_real_escape_string($conn, $_POST['website']);
	$isadmin = mysqli_real_escape_string($conn, $_POST['type']);
	$msg = mysqli_real_escape_string($conn, $_POST['msg']);
	
	$sql = "UPDATE clients SET Email='$em',FullName='$name',Mobile='$mobile',Company='$cname',Website='$url',IsAdmin='$isadmin',Message='$msg' WHERE ID='$id'";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed.";
	}
	else
	{
		header('Location: ../home.php');
	}