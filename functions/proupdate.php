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
	
	$id = mysqli_real_escape_string($conn, $sessionid);
	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
	$pass = mysqli_real_escape_string($conn, $_POST['password']);
	$url = mysqli_real_escape_string($conn, $_POST['url']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	if($pass == null || $fname == null || $mobile == null){
		header('Location: ../home.php?page=profile');exit;die;
	}
	$sql = "UPDATE clients SET Password='".md5(md5($pass))."',FullName='$fname',Mobile='$mobile',Website='$url' WHERE ID='$id'";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed.";
	}
	else
	{
		header('Location: ../home.php?page=profile');
	}