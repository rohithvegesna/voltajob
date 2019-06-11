<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
</head>
<body>

<div class="container">
<table id="table" class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Decription</th>
      </tr>
    </thead>
    <tbody>
	<?php
		include_once "functions/db.php";
		
		$sql = "SELECT * FROM jobs WHERE Status=1";
		$res = mysqli_query( $db, $sql );
		
		if( !is_bool($res) )
		{
			while($array = mysqli_fetch_array($res))
			{
				$sql1 = "SELECT * FROM connection WHERE Status=1 AND JobID='".$array['ID']."'";
				$res1 = mysqli_query( $db, $sql1 );
				$array1 = mysqli_fetch_array($res1);
				if($array1['JobID'] == $array['ID']){
					$button = '<form id="chat" action="chat.php" method="post" target="_blank">
									<input type="hidden" name="chat" value="'.$array1['ID'].'">
									<input type="hidden" name="userto" value="'.$array1['CompanyID'].'">
									<button type="submit" title="Chat" class="btn btn-lg btn-red btn-effect">Chat</button>
								</form>';
				}
				elseif($array1['JobID'] != $array['ID']){
					$button = '<a type="button" href="buy.php?job='.$array['ID'].'" class="btn btn-lg btn-red btn-effect">Contact Company</a>';
				}
				echo '<tr>
						<td>'.$array['ID'].'</td>
						<td id="editor'.$array['ID'].'" style="height:100%;font-weight:normal;font-size:inherit;"></td>
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
  <button id="btnExport">aca</button>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $("#btnExport").click(function(e) {
    e.preventDefault();

    $("#table").table2excel({  
			name: "Table2Excel",  
			filename: "myFileName",  
			fileext: ".xls"  
		});
  });
});
</script>
</body>
</html>