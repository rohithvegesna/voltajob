<?php
date_default_timezone_set('Asia/Kolkata');
	 session_start();
	if( !isset($_SESSION['eMail']) )
	{
		header('Location: functions/logout.php');die;exit;
	}
	
	else
	{
		$_SESSION['time'] = time();
		include "db.php";
		$isadmin = $_SESSION['IsAdmin'];
		$sessionid = $_SESSION['userID'];
	}
if($isadmin == 'Admin' && $isadmin != 'Agency' && $isadmin != 'Company'){
	$type=mysqli_real_escape_string($db,$_POST['typ']);
	$timein=mysqli_real_escape_string($db,$_POST['date']);
	$time=time();
	$timeto = strtotime(substr($timein, -11));
	$timefrom = strtotime(substr($timein, 0, 11));
	if($type != 'jobspdf')
	{
		if($type == 'jobs')
		{
			$sql_data="SELECT b.Company,a.Title AS Job,a.Nop AS Positions,a.Days,a.Loc AS Location,a.Amount,a.Type,a.Role,a.Position,a.level,a.Cat AS Category,a.Design AS Designation,a.Ind AS Industry,FROM_UNIXTIME(a.Doe) AS Date FROM jobs a,clients b WHERE a.Status='1' AND a.CompanyID=b.ID AND a.Doe > '$timefrom' AND a.Doe < '$timeto' ORDER BY a.Doe ASC";
		}
		elseif($type == 'connection')
		{
			$sql_data="SELECT a.Title,b.Company,b.FullName AS CompanyContact,b.Email,b.Mobile,c.Company,c.FullName AS AgencyContact,c.Email,c.Mobile,d.Plan,d.Payment,FROM_UNIXTIME(d.Doe) AS Date FROM jobs a,clients b,clients c,connection d WHERE d.Status='1' AND d.JobID=a.ID AND d.CompanyID=b.ID AND d.AgencyID=c.ID AND d.Doe > '$timefrom' AND d.Doe < '$timeto' ORDER BY d.Doe ASC";
		}
		elseif($type == 'agency')
		{
			$sql_data="SELECT Company AS Company,FullName AS ContactPerson,Email,Mobile AS Phone,Website,FROM_UNIXTIME(Doe) AS Date FROM clients WHERE (Company IS NOT NULL OR Mobile IS NOT NULL) AND IsAdmin='Agency' ORDER BY Doe ASC";
		}
		elseif($type == 'company')
		{
			$sql_data="SELECT Company AS Company,FullName AS ContactPerson,Email,Mobile AS Phone,Website,FROM_UNIXTIME(Doe) AS Date FROM clients WHERE (Company IS NOT NULL OR Mobile IS NOT NULL) AND IsAdmin='Company' ORDER BY Doe ASC";
		}
			$result_data= mysqli_query( $db, $sql_data );
		$filename = $type.date('d/m/Y', $time).".xls"; // File Name
		
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\""); 
		header("Pragma: no-cache"); 
		header("Expires: 0");

		$flag = false;
		while ($row = mysqli_fetch_assoc($result_data)) {
			if (!$flag) {
				// display field/column names as first row
				echo implode("\t", array_keys($row)) . "\r\n";
				$flag = true;
			}
			echo implode("\t", array_values($row)) . "\r\n";
		}
	}
	else
	{?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo 'Jobwithdes'.$timein;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- Core build with no theme, formatting, non-essential modules -->
	<link href="//cdn.quilljs.com/1.3.2/quill.core.css" rel="stylesheet">
	<script src="//cdn.quilljs.com/1.3.2/quill.core.js"></script>
	
	<!-- Main Quill library -->
	<script src="//cdn.quilljs.com/1.3.2/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.2/quill.min.js"></script>

	<!-- Theme included stylesheets -->
	<link href="//cdn.quilljs.com/1.3.2/quill.snow.css" rel="stylesheet">
	<link href="//cdn.quilljs.com/1.3.2/quill.bubble.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
</head>
<body>

<div class="container">
<table id="table" class="table table-bordered">
    <thead>
      <tr>
        <th>Company</th>
        <th>Job</th>
        <th>Description</th>
        <th>Positions</th>
        <th>Days</th>
        <th>Location</th>
        <th>Amount</th>
        <th>Role</th>
        <th>Position</th>
        <th>level</th>
        <th>Category</th>
        <th>Designation</th>
        <th>Industry</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
	<?php		
		$sql = "SELECT a.ID AS ID,b.Company,a.Title,a.Des,a.Nop,a.Days,a.Loc,a.Amount,a.Type,a.Role,a.Position,a.level,a.Cat,a.Design,a.Ind,FROM_UNIXTIME(a.Doe) AS Date FROM jobs a,clients b WHERE a.Status='1' AND a.CompanyID=b.ID AND a.Doe > '$timefrom' AND a.Doe < '$timeto' ORDER BY a.Doe ASC";
		$res = mysqli_query( $db, $sql );
		
		if( !is_bool($res) )
		{
			while($array = mysqli_fetch_array($res))
			{
				echo '<tr>
						<td>'.$array['Company'].'</td>
						<td>'.$array['Title'].'</td>
						<td><div id="editor'.$array['ID'].'" style="font-weight:normal;font-size:inherit;"></div></td>
						<td>'.$array['Nop'].'</td>
						<td>'.$array['Days'].'</td>
						<td>'.$array['Loc'].'</td>
						<td>'.$array['Amount'].' '.$array['Type'].'</td>
						<td>'.$array['Role'].'</td>
						<td>'.$array['Position'].'</td>
						<td>'.$array['level'].'</td>
						<td>'.$array['Cat'].'</td>
						<td>'.$array['Design'].'</td>
						<td>'.$array['Ind'].'</td>
						<td>'.$array['Date'].'</td>
					  </tr>
									
									<!-- Initialize Quill editor -->
									<script>
										var quill'.$array['ID'].' = new Quill("#editor'.$array['ID'].'");
										quill'.$array['ID'].'.setContents('.$array['Des'].');
										quill'.$array['ID'].'.enable(false);
									</script>';
			}
		}
	?>	  
    </tbody>
  </table>
</div>
<script type="text/javascript">
$(document).ready( function () {
    $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</body>
</html>
<?php }}?>