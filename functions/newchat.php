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
	$chat = mysqli_real_escape_string($conn, $_POST['chatid']);
	$comp = mysqli_real_escape_string($conn, $_POST['comp']);
	$msg = mysqli_real_escape_string($conn, $_POST['msg']);
	$time = time();

	$sql = "SELECT COUNT(*) FROM connection WHERE Status='1' AND ID=".$chat;
	$qury = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($qury);
	if($array['COUNT(*)'] == '0')
	{
		echo "You need to have a connection first!";exit;die;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS chat ( ID INT NOT NULL AUTO_INCREMENT, ChatID TEXT, ChatTO TEXT, ChatFROM TEXT, Msg TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql1 = "INSERT into chat (`ChatID`, `ChatTO`, `ChatFROM`, `Msg`, `Doe`) VALUES ('$chat', '$comp', '$agencyid', '$msg', '$time')";
	$qury1 = mysqli_query($conn, $sql1);

	if(!$qury1)
	{
		echo "Failed.";
	}