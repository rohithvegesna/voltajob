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
	
	$agencyid = $sessionid;
	$ticket = mysqli_real_escape_string($conn, $_POST['ticket']);
	$chatto = mysqli_real_escape_string($conn, $_POST['comp']);
	$msg = mysqli_real_escape_string($conn, $_POST['msg']);
	$url = mysqli_real_escape_string($conn, $_POST['url']);
	$time = time();
	
	$sql = "CREATE TABLE IF NOT EXISTS chatadm ( ID INT NOT NULL AUTO_INCREMENT, Ticket TEXT, ChatTO TEXT, ChatFROM TEXT, Msg TEXT, Status TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql1 = "INSERT into chatadm (`Ticket`, `ChatTO`, `ChatFROM`, `Msg`, `Status`, `Doe`) VALUES ('$ticket', '$chatto', '$agencyid', '$msg', '1', '$time')";
	$qury1 = mysqli_query($conn, $sql1);

	if(!$qury1)
	{
		echo "Failed.";
	}
	if($url == 'abc')
	{
		header("Location: ../home.php?page=admincontact");
	}