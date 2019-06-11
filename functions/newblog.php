<?php
	 session_start();
	if( !isset($_SESSION['eMail']) )
	{
		header('Location: functions/logout.php');die;exit;
	}
	
	if( !isset($_POST) || !isset($_POST['title']) )
	{
		var_dump($_POST);
		exit("No Form Submitted !"); die;
	}
	include_once('db.php');
	$time = time();
	
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$des = mysqli_real_escape_string($conn, $_POST['desc']);
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
	
	$sql = "CREATE TABLE IF NOT EXISTS blog ( ID INT NOT NULL AUTO_INCREMENT, Title TEXT, RawDescription TEXT, Description TEXT, Photo MEDIUMBLOB, PhotoBG MEDIUMBLOB, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	$sql = "INSERT into blog (`Title`, `RawDescription`, `Description`, `Photo`, `PhotoBG`, `Doe`) VALUES ('$title', '$des', '', '$image', '$image1', '$time')";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	$sql = "SELECT ID FROM blog WHERE Title='$title' AND RawDescription='$des' AND Doe='$time'";
	$res = mysqli_fetch_array(mysqli_query($conn, $sql));
	$ID = $res['ID'];
	
	$rawDesc = $des;
	$rawDesc = preg_replace('/@url_(.*?)_(.*?)@/', '<a target="_blank" href="$2">$1</a>', $rawDesc); //checking url from string
	$rawDesc = preg_replace('/@sub_(.*?)@/', '</p><h2>$1</h2><p>', $rawDesc); //checking subtitles
	$rawDesc = preg_replace('/@b_(.*?)@/', '<span style="font-weight: bold;">$1</span>', $rawDesc); //checking bold letters
	$rawDesc = preg_replace('/@i_(.*?)@/', '<span style="font-style: italic;">$1</span>', $rawDesc); //checking italic text
	$rawDesc = preg_replace('/@u_(.*?)@/', '<span style="text-decoration: underline;">$1</span>', $rawDesc); //checking underlined text
	$rawDesc = preg_replace('/@hr@/', '<hr>', $rawDesc); //checking hr line
	$rawDesc = preg_replace('/@enter@/', '<br>', $rawDesc); //checking line breaks
	
	$sql = "UPDATE `blog` SET `Description`='$rawDesc' WHERE ID=$ID";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	header("Location: ../home.php?page=blog");
?>


