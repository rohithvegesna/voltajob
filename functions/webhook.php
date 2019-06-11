<?php

$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.

$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without the <>.
$mac_calculated = hash_hmac("sha1", implode("|", $data), "d4281725c61d4486869fb93bb7f0b8be");

if($mac_provided == $mac_calculated){
    echo "MAC is fine";
    // Do something here
    if($data['status'] == "Credit"){
       // Payment was successful, mark it as completed in your database
	   function ran_string($minlength, $maxlength, $useupper, $usespecial, $usenumbers) 
		{
			$key = "";
			$charset = "abcdefghijklmnopqrstuvwxyz";
			if ($useupper) $charset.= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			if ($usenumbers) $charset.= "0123456789";
			if ($usespecial) $charset.= "~@#\$%^*()_+-={}|][";
			if ($minlength > $maxlength) $length = mt_rand($maxlength, $minlength);
			else
			{
				$length = mt_rand($minlength, $maxlength);
			}
			for ($i = 0;$i < $length;$i++) $key.= $charset[(mt_rand(0, (strlen($charset) - 1))) ];
			return $key;
		}
		
		$conn = mysqli_connect('voltajob.com','voltalist_sendy','dszx2356', 'voltalist_sendy');
		$db   = $conn;
		
		if($data['purpose'] == 'Basic Plan'){
			$mailno = 2000;
		}
		elseif($data['purpose'] == 'Starter Plan'){
			$mailno = 10000;
		}
		if($data['purpose'] == 'Pro Plan'){
			$mailno = 50000;
		}
		if($data['purpose'] == 'Business Plan'){
			$mailno = 100000;
		}
		
		$today_unix_timestamp = time();
		$day_today = strftime("%e", $today_unix_timestamp);
		$month_today = strftime("%b", $today_unix_timestamp);
		$month_next = strtotime('1 '.$month_today.' +1 month');
		$month_next = strftime("%b", $month_next);
		$sql = 'INSERT INTO apps (userID, app_name, from_name, from_email, reply_to, allowed_attachments, currency, delivery_fee, cost_per_recipient, smtp_host, smtp_port, smtp_ssl, smtp_username, smtp_password, app_key, allocated_quota, day_of_reset, month_of_next_reset) VALUES ("1", "'.$data['buyer_name'].'", "'.$data['buyer_name'].'", "'.$data['buyer'].'", "'.$data['buyer'].'", "", "USD", "", "", "", "", "ssl", "", "", "'.ran_string(30, 30, true, false, true).'", '.$mailno.', '.$day_today.', "'.$month_next.'")';
		$qurry = mysqli_query($db, $sql);
		if ($qurry)
		{
			//app id
			$id = mysqli_insert_id($db);
			
			//insert new record
			$sql = 'INSERT INTO login (name, company, username, password, tied_to, app, timezone, language) VALUES ("'.$data['buyer_name'].'", "'.$data['buyer_name'].'", "'.$data['buyer'].'", "'.$pass_encrypted.'", "1", '.$id.', "Asia/Kolkata", "en_US")';
			$qurry = mysqli_query($db, $sql);
			if($qurry){}
		}
	}
    else{
       // Payment was unsuccessful, mark it as failed in your database
    }
}
else{
    echo "Invalid MAC passed";
}
?>