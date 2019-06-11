<?php
	 session_start();
	if( !isset($_SESSION['eMail']) )
	{
		header('Location: logout.php');die;exit;
	}
	
	include_once('db.php');
	
	$blog = mysqli_real_escape_string($conn, $_GET['blog']);
	
	$sql = "DELETE FROM blog WHERE ID='$blog'";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	header("Location: ../home.php?page=blog");
?>


