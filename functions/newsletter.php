<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();

	include_once('db.php');
	
	$em = mysqli_real_escape_string($conn, $_GET['news']);
	$time = time();
	
	$sql = "CREATE TABLE IF NOT EXISTS newsletter ( ID INT NOT NULL AUTO_INCREMENT, Email TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	if(filter_var($em, FILTER_VALIDATE_EMAIL)){
		$sql = "SELECT COUNT(*) FROM newsletter WHERE Email='".$em."'";
		$res = mysqli_query($conn, $sql);
		$array = mysqli_fetch_array($res);
		if($array['COUNT(*)'] == '0'){
			$sql1 = "INSERT into newsletter (`Email`, `Doe`) VALUES ('$em', '$time')";
			$qury1 = mysqli_query($conn, $sql1);
			echo '<h2>Newsletter</h2>
				<p>Get the latest news via email:</p>
				<form>
					<input disabled="disabled" value="Thanks for subscribing!" style="border: 2px solid green;" class="form-control">
				</form>';
		}
		else{
			echo '<h2>Newsletter</h2>
				<p>Get the latest news via email:</p>
				<form>
					<input disabled="disabled" value="Thanks your email has been already registered!" style="border: 2px solid green;" class="form-control">
				</form>';
		}
	}
	else{
		echo '<h2>Newsletter</h2>
				<p>Get the latest news via email:</p>
				<form id="form" autocomplete="off">
					<input type="email" id="emlnews" class="form-control" placeholder="Please enter the correct email!" style="border: 2px solid red;">
					<a onclick="showNews();" class="submit sprite"></a>
				</form>';
	}