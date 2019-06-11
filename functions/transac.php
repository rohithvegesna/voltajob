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
	
	if($isadmin != 'Agency' && $compid == null)
	{
		exit;die;
	}
	
	$sql = "SELECT * FROM clients WHERE ID=".$sessionid;
	$res = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($res);
	$name = $array['FullName'];
	$email = $array['Email'];
	$phone = $array['Mobile'];

$fee = (3 + ($price * (2/100)));
$tax = ($fee * (15/100));
$total = $price + $fee + $tax;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
 array("X-Api-Key:5eebc8d60800de9ce6511e9a7d35db9a",
                  "X-Auth-Token:46a3502cbe635c21bff8e09dafd783d8"));
$payload = Array(
    "purpose" => "Lumpsum Plan",
	"amount" => $total,
	"buyer_name" => $name,
	"phone" => $phone,
	"send_sms" => true,
	"email" => $email,
	"send_email" => true,
	"allow_repeated_payments" => false,
    "webhook" => "http://test.voltalist.com/funcs/webhook.php",
	"redirect_url" => "http://test.voltalist.com/thankyou.php"
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$decode = json_decode($response, true);
$longurl = $decode['payment_request']['longurl'];
header("Location: $longurl");
exit();

?>