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
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	
	if($isadmin != 'Admin' && $compid == null)
	{
		exit;die;
	}
	
	$sql = "UPDATE connection SET Status = '1' WHERE ID=".$id;
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed.";
	}
	else
	{
		$sql = "SELECT Company,Email FROM clients WHERE ID=(SELECT AgencyID FROM connection WHERE ID='".$id."')";
		$qury = mysqli_query($conn, $sql);
		$array = mysqli_fetch_array($qury);
		$sql1 = "SELECT Fullname,Mobile,Email FROM clients WHERE ID=(SELECT CompanyID FROM connection WHERE ID='".$id."')";
		$qury1 = mysqli_query($conn, $sql1);
		$array1 = mysqli_fetch_array($qury1);
		$fullname = $array1['Fullname'];
		$emailcomp = $array1['Mobile'];
		$number = $array1['Email'];
		$compa = $array['Company'];
		$em = $array['Email'];
		
		$to = $em;
		$subject = "Voltajob - Connection Activated";
$message = <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Voltajob</title>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <style type="text/css">
  body {margin: 0; padding: 0; min-width: 100%!important;}
  img {height: auto;}
  .content {width: 100%; max-width: 600px;}
  .header {padding: 40px 30px 20px 30px;}
  .innerpadding {padding: 30px 30px 30px 30px;}
  .borderbottom {border-bottom: 1px solid #f2eeed;}
  .subhead {font-size: 15px; color: #ffffff; font-family: 'Lato', sans-serif; letter-spacing: 10px;}
  .h1, .h2, .bodycopy {color: #153643; font-family: 'Lato', sans-serif;}
  .h1 {font-size: 60px; line-height: 38px; font-weight: bold;}
  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
  .bodycopy {font-size: 16px; line-height: 22px;}
  .button {text-align: center; font-size: 18px; font-family: 'Lato', sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
  .button a {color: #ffffff; text-decoration: none;}
  .footer {padding: 20px 30px 15px 30px;}
  .footercopy {font-family: 'Lato', sans-serif; font-size: 14px; color: #ffffff;}
  .footercopy a {color: #ffffff; text-decoration: underline;}

  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
  body[yahoo] .hide {display: none!important;}
  body[yahoo] .buttonwrapper {background-color: transparent!important;}
  body[yahoo] .button {padding: 0px!important;}
  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
  }
  </style>
</head>

<body yahoo bgcolor="#f6f8f1">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->     
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td style="background: linear-gradient(#7532c7,#32c7c2);" class="header">
          <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">  
            <tr>
              <td height="70">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="subhead" style="padding: 0 0 0 3px;">
                      <!--CREATING-->
                    </td>
                  </tr>
                  <tr>
                    <td class="h1" style="padding: 5px 0 0 0; color: #fff;">
						Voltajob
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2">
                Your new connection has been activated!
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
				Thank you for showing interest in sourcing candidates for the following client.<br>
				Contact Person: $fullname<br>
				Phone: $number<br>
				Email: $emailcomp<br>
				Please log in to get the Job description. You can negotiate with client and fix the right fee if you are able to source the candidate immediately. We just take 15% of the total money paid by company.<br>
				Please include <a href="mailto:j@voltajob.com">j@voltajob.com</a> on all the emails and resumes you send to company. This will help us to ensure that we all work together to fill the open position and get paid for placing the candidate.
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="footer" bgcolor="#44525f">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" class="footercopy">
                Copyright &copy; Voltajob 2017
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
    </table>
    <![endif]-->
    </td>
  </tr>
</table>
</body>
</html>
EOF;

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <info@voltajob.com>' . "\r\n";

		if(mail($to,$subject,$message,$headers))
		{
			$sql = "SELECT Email FROM clients WHERE ID=(SELECT CompanyID FROM connection WHERE ID='".$id."')";
			$qury = mysqli_query($conn, $sql);
			$array = mysqli_fetch_array($qury);
			$sql1 = "SELECT Title FROM jobs WHERE ID=(SELECT JobID FROM connection WHERE ID='".$id."')";
			$qury1 = mysqli_query($conn, $sql1);
			$array1 = mysqli_fetch_array($qury1);
			$tit = $array1['Title'];
			$em = $array['Email'];
		
		$to = $em;
		$subject = "Voltajob - New Connection";
$message = <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Voltajob</title>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <style type="text/css">
  body {margin: 0; padding: 0; min-width: 100%!important;}
  img {height: auto;}
  .content {width: 100%; max-width: 600px;}
  .header {padding: 40px 30px 20px 30px;}
  .innerpadding {padding: 30px 30px 30px 30px;}
  .borderbottom {border-bottom: 1px solid #f2eeed;}
  .subhead {font-size: 15px; color: #ffffff; font-family: 'Lato', sans-serif; letter-spacing: 10px;}
  .h1, .h2, .bodycopy {color: #153643; font-family: 'Lato', sans-serif;}
  .h1 {font-size: 60px; line-height: 38px; font-weight: bold;}
  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
  .bodycopy {font-size: 16px; line-height: 22px;}
  .button {text-align: center; font-size: 18px; font-family: 'Lato', sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
  .button a {color: #ffffff; text-decoration: none;}
  .footer {padding: 20px 30px 15px 30px;}
  .footercopy {font-family: 'Lato', sans-serif; font-size: 14px; color: #ffffff;}
  .footercopy a {color: #ffffff; text-decoration: underline;}

  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
  body[yahoo] .hide {display: none!important;}
  body[yahoo] .buttonwrapper {background-color: transparent!important;}
  body[yahoo] .button {padding: 0px!important;}
  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
  }
  </style>
</head>

<body yahoo bgcolor="#f6f8f1">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->     
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td style="background: linear-gradient(#7532c7,#32c7c2);" class="header">
          <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">  
            <tr>
              <td height="70">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="subhead" style="padding: 0 0 0 3px;">
                      <!--CREATING-->
                    </td>
                  </tr>
                  <tr>
                    <td class="h1" style="padding: 5px 0 0 0; color: #fff;">
						Voltajob
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2">
                Congratulations !
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
				<q>$compa</q> would like to source candidates for you for your job <q>$tit</q>. They will contact you soon.
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="footer" bgcolor="#44525f">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" class="footercopy">
                Copyright &copy; Voltajob 2017
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
    </table>
    <![endif]-->
    </td>
  </tr>
</table>
</body>
</html>
EOF;

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <info@voltajob.com>' . "\r\n";

		if(mail($to,$subject,$message,$headers))
		{
			header('Location: ../home.php?page=connection');
		}
		}
	}