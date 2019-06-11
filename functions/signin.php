<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php 
	include_once("db.php"); 
	session_start(); 
 
	$em = htmlspecialchars($_POST['em']);
	$pass = htmlspecialchars($_POST['pwd']);
	
	$sql = "SELECT Status FROM clients WHERE( Email='".$em."' AND Password='".md5(md5($pass))."')";
	$qury = mysqli_query($db, $sql);
	$result = mysqli_fetch_array($qury);
	if( $result['Status'] == '2' )
	{
		header("Location: ../error.php?note=".urlencode('Your account has been suspended sue to some reasons. Please contact admin@voltajob.com'));die;exit;
	}
	
	else
	{
		$sql = "SELECT count(*),ID,IsAdmin,Message FROM clients WHERE( Email='".$em."' AND Password='".md5(md5($pass))."') GROUP BY ID";

		$qury = mysqli_query($db, $sql);

		$result = mysqli_fetch_array($qury);
		
		if($result['count(*)']!=0)
		{
			$_SESSION['eMail'] = $em;
			$_SESSION['userID'] = $result['ID'];
			$_SESSION['IsAdmin'] = $result['IsAdmin'];
			$_SESSION['Message'] = $result['Message'];
			$_SESSION['time'] = time();
			
			header('Location: ../home.php');
			exit;
		}
		header('Location: ../login.php?msg=1');
	}
?>