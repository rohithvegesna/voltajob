<?php
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
	$chat = $_GET['q'];
	$sql = "SELECT * FROM chatadm WHERE Ticket='".$chat."' ORDER BY Doe ASC";
	$qury = mysqli_query($conn, $sql);
	if( !is_bool($qury) )
	{
		while($array = mysqli_fetch_array($qury))
		{
			if($sessionid == $array['ChatFROM'])
			{
				$pos = 'right';
			}
			elseif($sessionid == $array['ChatTO'])
			{
				$pos = 'left';
			}
			echo '<div class="well well-sm '.$pos.'">'.$array['Msg'].'</div><br><hr>';
		}
	}
?>