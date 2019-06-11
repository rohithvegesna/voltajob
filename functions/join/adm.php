<!--Admin-->
<?php 
if($page == null && $isadmin == 'Admin' && $isadmin != 'Agency' && $isadmin != 'Company'){
?>
	<!-- Selected Jobs -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"> All <strong>Users</strong></h2><br>
			<button class="btn btn-lg btn-red btn-effect" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Client</button><br>
			
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New Client</h4>
				  </div>
				  <div class="modal-body">
					<form action="functions/newclient.php" method="post">
					  <div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" name="email" required>
					  </div>
					  <div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" name="pwd" required>
					  </div>
					  <div class="form-group">
						<label for="fn">Full Name:</label>
						<input type="text" class="form-control" name="fn" required>
					  </div>
					  <div class="form-group">
						<label for="fn">Company Name:</label>
						<input type="text" class="form-control" name="cn" required>
					  </div>
					  <div class="form-group">
						<label for="fn">Mobile:</label>
						<input type="tel" max-length="10" class="form-control" name="phone" required>
					  </div>
					  <div class="form-group">
						<label for="fn">Website:</label>
						<input type="text" class="form-control" name="website">
					  </div>
					  <div class="form-group">
						<label for="fn">Type:</label>
						<select class="form-control" name="type" required>
							<option></option>
							<option value="Company">Company</option>
							<option value="Agency">Agency</option>
						</select>
					  </div>
					  <button type="submit" class="btn btn-lg btn-red btn-effect">Create</button>
					</form>
				  </div>
				</div>

			  </div>
			</div>
			<table class="table table-bordered table-striped" id="table1">
				<thead>
				  <tr>
					<th>ID</th>
					<th>FullName</th>
					<th>Company</th>
					<th>Type</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Status</th>
					<th>Edit</th>
					<th>Suspend</th>
					<th>Delete</th>
				  </tr>
				</thead>
				<tbody>
			<?php
				include_once "functions/db.php";
				
				$sql = "SELECT * FROM clients ORDER BY Doe DESC";
				$res = mysqli_query( $db, $sql );
				
				if( !is_bool($res) )
				{
					while($array = mysqli_fetch_array($res))
					{
						if($array['Status'] == '1')
						{
							$status = "<strong style='color:green;'>Active</strong>";
							$button = '<a href="functions/suspendclient.php?id='.$array['ID'].'"><button class="btn btn-success">Suspend</button></a>';
						}
						elseif($array['Status'] == '2')
						{
							$status = "<strong style='color:red;'>Suspended</strong>";
							$button = '<a href="functions/activateclient.php?id='.$array['ID'].'"><button class="btn btn-warning">Activate</button></a>';
						}
						echo '<tr>
								<td>'.$array['ID'].'</td>
								<td>'.$array['FullName'].'</td>
								<td>'.$array['Company'].'</td>
								<td>'.$array['IsAdmin'].'</td>
								<td>'.$array['Email'].'</td>
								<td>'.$array['Mobile'].'</td>
								<td>'.$status.'</td>
								<td><a data-toggle="modal" data-target="#myModal'.$array['ID'].'"><button class="btn btn-warning">Edit</button></a></td>
								<td>'.$button.'</td>
								<td><a href="functions/deleteclient.php?id='.$array['ID'].'"><button class="btn btn-danger">Delete</button></a></td>
							  </tr>
							  <!-- Modal -->
								<div id="myModal'.$array['ID'].'" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Client</h4>
									  </div>
									  <div class="modal-body">
										<form action="functions/editclient.php" method="post">
										  <div class="form-group">
											<label for="email">Email address:</label>
											<input type="hidden" name="id" value="'.$array['ID'].'" required>
											<input type="email" class="form-control" name="email" value="'.$array['Email'].'" required>
										  </div>
										  <div class="form-group">
											<label for="fn">Full Name:</label>
											<input type="text" class="form-control" name="fn" value="'.$array['FullName'].'" required>
										  </div>
										  <div class="form-group">
											<label for="fn">Company Name:</label>
											<input type="text" class="form-control" name="cn" value="'.$array['Company'].'" required>
										  </div>
										  <div class="form-group">
											<label for="fn">Mobile:</label>
											<input type="tel" max-length="10" class="form-control" name="phone" value="'.$array['Mobile'].'" required>
										  </div>
										  <div class="form-group">
											<label for="fn">Website:</label>
											<input type="text" class="form-control" name="website" value="'.$array['Website'].'">
										  </div>
										  <div class="form-group">
											<label for="fn">Type:</label>
											<select class="form-control" name="type" required>
												<option value="'.$array['IsAdmin'].'">'.$array['IsAdmin'].'</option>
												<option value="Company">Company</option>
												<option value="Agency">Agency</option>
											</select>
										  </div>
										  <div class="form-group">
											<label for="fn">Message:</label>
											<input type="text" class="form-control" name="msg" value="'.$array['Message'].'">
										  </div>
										  <button type="submit" class="btn btn-lg btn-red btn-effect">Edit</button>
										</form>
									  </div>
									</div>

								  </div>
								</div>';
					}
				}
			?>
				</tbody>
			</table>
		</div>
	</div>
<script>
$(document).ready(function() {
    $('#table1').DataTable();
} );
</script>
<?php 
}
?>

<?php 
if($page == 'posts' && $isadmin == 'Admin' && $isadmin != 'Agency' && $isadmin != 'Company'){
?>
	<!-- Job Posts -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"> All <strong>Posts</strong></h2><br>
			<button class="btn btn-lg btn-red btn-effect" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Post</button><br>
			
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New Post</h4>
				  </div>
				  <div class="modal-body"> 
					<form action="functions/newjobadm.php" method="post">
					  <div class="form-group">
						<label for="id">Company ID:</label>
						<input type="number" class="form-control" name="compid" required>
					  </div>
					  <div class="form-group">
						<label for="title">Job Title:</label>
						<input type="text" class="form-control" name="title" required>
					  </div>
					  <div class="form-group">
						<label for="title">No of positions:</label>
						<input class="form-control" type="number" name="nop" min="1" required>
					  </div>
					  <div class="form-group">
						<label for="days">No of days to close:</label>
						<input class="form-control" type="number" name="days" min="1" max="365" required>
					  </div>
					  <div class="form-group">
						<label for="days">Location:</label>
						<input class="form-control" type="text" name="loc" required>
					  </div>
					  <div class="form-group">
						<label for="amount">Amount/Percent payed after completion:</label>
						<input type="number" name="amount" class="form-control" required>
					  </div>
					  <div class="form-group">
						<label for="type">Percent/Lumpsum:</label>
						<select name="type" class="form-control" required>
							<option value=""></option>
							<option value="lumpsum">Lumpsum</option>
							<option value="percent">Percent per candidate</option>
						</select>
					  </div>
					  <div class="form-group">
						<label for="role">What kind of Roles does this job belong to ?:</label>
						<select name="role" class="form-control" required>
							<option value=""></option>
							<option value="IT">IT</option>
							<option value="NONIT">NON - IT</option>
							<option value="BOTH">BOTH</option>
						</select>
					  </div>
					  <div class="form-group">
						<label for="position">Type of Positions:</label>
						<select name="position" class="form-control" required>
							<option value=""></option>
							<option value="Permanent">Permanent</option>
							<option value="Contract">Contract</option>
							<option value="Both">Both</option>
						</select>
					  </div>
					  <div class="form-group">
						<label for="level">Please select the level of roles you like source candidates:</label>
						<select name="level" class="form-control" required>
							<option value=""></option>
							<option value="Entry Level">Entry Level</option>
							<option value="Mid Level">Mid Level</option>
							<option value="Senior/Executive Positions">Senior/Executive Positions</option>
							<option value="Leadership Roles">Leadership Roles</option>
						</select>
					  </div>
					  <div class="form-group">
						<label for="cat">Please specify the strengths required in terms of JOB SKILLS:</label>
						<select name="cat" id="cat" class="form-control" required>
							<option value=""></option>
							<?php
								include_once "functions/db.php";
								$sql = "SELECT DISTINCT Cat FROM jobskills";
								$res = mysqli_query( $db, $sql );
								
								if( !is_bool($res) )
								{
									while($array = mysqli_fetch_array($res))
									{
										echo '<option value="'.$array['Cat'].'">'.$array['Cat'].'</option>';
									}
								}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<label for="design">Designation:</label>
						<input type="text" class="form-control" name="design" required>
					  </div>
					  <div class="form-group">
						<label for="ind">Type of Industry:</label>
						<select name="ind" class="form-control" required>
							<option value=""></option>
							<?php
								include_once "functions/db.php";
								$sql = "SELECT DISTINCT Type FROM industry";
								$res = mysqli_query( $db, $sql );
								
								if( !is_bool($res) )
								{
									while($array = mysqli_fetch_array($res))
									{
										echo '<option value="'.$array['Type'].'">'.$array['Type'].'</option>';
									}
								}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<input type="hidden" name="desc" id="desc" value="" class="form-control input-field" required>
						<div id="editor" class="form-control" style="height:100%;font-weight:normal;font-size:inherit;"></div>
						
						<!-- Initialize Quill editor -->
						<script>
							var options = {
							  placeholder: 'Write your Job Description here, dont write company name, phone number or email address ',
							  theme: 'snow'
							};
							var quill = new Quill('#editor', options);
							var preciousContent = document.getElementById('desc');

							quill.on('text-change', function() {
							  var delta = quill.getContents();
							  preciousContent.value = JSON.stringify(delta);
							});
						</script>
					  </div>
					  <button type="submit" class="btn btn-lg btn-red btn-effect">Create</button>
					</form>
				  </div>
				</div>

			  </div>
			</div>
			
			<table class="table table-bordered table-striped" id="table2">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Company</th>
					<th>Contact Person</th>
					<th>Title</th>
					<th>Time</th>
					<th>Delete</th>
					<th>Edit</th>
					<th>Activate</th>
				  </tr>
				</thead>
				<tbody>
			<?php
				include_once "functions/db.php";
				
				$sql = "SELECT * FROM jobs ORDER BY Doe DESC";
				$res = mysqli_query( $db, $sql );
				
				if( !is_bool($res) )
				{
					while($array = mysqli_fetch_array($res))
					{
						$sql1 = "SELECT ID,FullName,Company,Email,Mobile FROM clients WHERE ID=".$array['CompanyID'];
						$res1 = mysqli_query( $db, $sql1 );
						$array1 = mysqli_fetch_array($res1);
						
						if($array['Status'] == '1')
						{
							$button = '<button class="btn btn-success">Activated</button>';
						}
						elseif($array['Status'] == '2')
						{
							$button = '<a href="functions/activatepost.php?id='.$array['ID'].'"><button class="btn btn-danger">Activate</button></a>';
						}
						echo '<tr>
								<td>'.$array['ID'].'</td>
								<td>'.$array1['Company'].'</td>
								<td>'.$array1['FullName'].'</td>
								<td>'.$array['Title'].'</td>
								<td>'.date('m/d/Y : h:i a', $array['Doe']).'</td>
								<td><a href="functions/deletejob.php?id='.$array['ID'].'"><button class="btn btn-danger">Delete</button></a></td>
								<td><a data-toggle="modal" data-target="#myModal'.$array['ID'].'"><button class="btn btn-warning">View/Edit</button></a></td>
								<td>'.$button.'</td>
							  </tr>
							  <!-- Modal -->
								<div id="myModal'.$array['ID'].'" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">New Post</h4>
									  </div>
									  <div class="modal-body">
										<form action="functions/editpost.php" method="post">
										  <div class="form-group">
											<label for="title">Title:</label>
											<input type="hidden" name="id" value="'.$array['ID'].'" required>
											<input type="text" class="form-control" name="title" value="'.$array['Title'].'" required>
											<input disabled="disabled" class="form-control" value="Mobile: '.$array1['Mobile'].'" required>
											<input disabled="disabled" class="form-control" value="Email: '.$array1['Email'].'" required>
											<input disabled="disabled" class="form-control" value="No of positions: '.$array['Nop'].'" required>
											<input disabled="disabled" class="form-control" value="Days: '.$array['Days'].'" required>
											<input disabled="disabled" class="form-control" value="Location: '.$array['Loc'].'" required>
											<input disabled="disabled" class="form-control" value="'.$array['Amount'].' '.$array['Type'].'" required>
											<input type="hidden" class="form-control" id="desc'.$array['ID'].'" name="desc" value="'.$array['Des'].'" required>
										  </div>
										  <div class="form-group">
											<label for="pwd">Description:</label>
											<div id="editor'.$array['ID'].'" class="form-control" style="height:100%;font-weight:normal;font-size:inherit;"></div>
												
												<!-- Initialize Quill editor -->
												<script>
												var options = {
												  theme: "snow"
												};
												var quill'.$array['ID'].' = new Quill("#editor'.$array['ID'].'", options);
												quill'.$array['ID'].'.setContents('.$array['Des'].');
												var preciousContent'.$array['ID'].' = document.getElementById("desc'.$array['ID'].'");

												quill'.$array['ID'].'.on("text-change", function() {
												  var delta'.$array['ID'].' = quill'.$array['ID'].'.getContents();
												  preciousContent'.$array['ID'].'.value = JSON.stringify(delta'.$array['ID'].');
												});
												</script>
										  </div>
										  <button type="submit" class="btn btn-lg btn-red btn-effect">Change</button><br>
										  <a class="btn btn-lg btn-default btn-effect" data-dismiss="modal">Close</a>
										</form>
									  </div>
									</div>

								  </div>
								</div>';
					}
				}
			?>
				</tbody>
			</table>
		</div>
	</div>
<script>
$(document).ready(function() {
    $('#table2').DataTable();
} );
</script>
<?php 
}
?>

<?php 
if($page == 'connection' && $isadmin == 'Admin' && $isadmin != 'Agency' && $isadmin != 'Company'){
?>
	<!-- connections -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"> All <strong>Connections</strong></h2><br>
			
			<table class="table table-bordered table-striped" id="table3">
				<thead>
				  <tr>
					<th>~@~</th>
					<th>Company</th>
					<th>Agency</th>
					<th>Job Details</th>
					<th>Plan</th>
					<th>Payment</th>
					<th>Time</th>
					<th>Activate</th>
				  </tr>
				</thead>
				<tbody>
			<?php
				include_once "functions/db.php";
				
				$sql = "SELECT * FROM connection ORDER BY Doe DESC";
				$res = mysqli_query( $db, $sql );
				
				if( !is_bool($res) )
				{
					while($array = mysqli_fetch_array($res))
					{
						$sql1 = "SELECT * FROM clients WHERE ID=".$array['CompanyID'];
						$res1 = mysqli_query( $db, $sql1 );
						$array1 = mysqli_fetch_array($res1);
						$sql2 = "SELECT * FROM clients WHERE ID=".$array['AgencyID'];
						$res2 = mysqli_query( $db, $sql2 );
						$array2 = mysqli_fetch_array($res2);
						$sql3 = "SELECT * FROM jobs WHERE ID=".$array['JobID'];
						$res3 = mysqli_query( $db, $sql3 );
						$array3 = mysqli_fetch_array($res3);
						
						if($array['Status'] == '1')
						{
							$button = '<button class="btn btn-success">Activated</button>';
						}
						elseif($array['Status'] == '2')
						{
							$button = '<a href="functions/activateconnection.php?id='.$array['ID'].'"><button class="btn btn-danger">Activate</button></a>';
						}
						echo '<tr>
								<td>'.$array1['ID'].'@'.$array2['ID'].'</td>
								<td>'.$array1['Company'].'('.$array1['Email'].' PH:'.$array1['Mobile'].')</td>
								<td>'.$array2['Company'].'('.$array2['Email'].' PH:'.$array2['Mobile'].')</td>
								<td><a data-toggle="modal" data-target="#myModal'.$array3['ID'].'"><button class="btn btn-warning">View</button></a></td>
								<td>'.$array['Plan'].'</td>
								<td>'.$array['Payment'].'</td>
								<td>'.date('d/m/Y : h:i a', $array['Doe']).'</td>
								<td>'.$button.'</td>
							  </tr>
							  <!-- Modal -->
								<div id="myModal'.$array3['ID'].'" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">New Post</h4>
									  </div>
									  <div class="modal-body">
										  <div class="form-group">
											<label for="title">Title:</label>
											<input disabled="disabled" class="form-control" value="'.$array3['Title'].'" required>
											<input disabled="disabled" class="form-control" value="Mobile: '.$array1['Mobile'].'" required>
											<input disabled="disabled" class="form-control" value="Email: '.$array1['Email'].'" required>
											<input disabled="disabled" class="form-control" value="No of positions: '.$array3['Nop'].'" required>
											<input disabled="disabled" class="form-control" value="Days: '.$array3['Days'].'" required>
											<input disabled="disabled" class="form-control" value="Location: '.$array3['Loc'].'" required>
											<input disabled="disabled" class="form-control" value="'.$array3['Amount'].' '.$array3['Type'].'" required>
										  </div>
										  <div class="form-group">
											<label for="pwd">Description:</label>
											<div id="editor'.$array3['ID'].'" class="form-control" style="height:100%;font-weight:normal;font-size:inherit;"></div>
												
												<!-- Initialize Quill editor -->
												<script>
												var options = {
												  theme: "bubble"
												};
												var quill'.$array3['ID'].' = new Quill("#editor'.$array3['ID'].'", options);
												quill'.$array3['ID'].'.setContents('.$array3['Des'].');
												quill'.$array3['ID'].'.enable(false);
												</script>
										  </div>
										  <a class="btn btn-lg btn-default btn-effect" data-dismiss="modal">Close</a>
									  </div>
									</div>

								  </div>
								</div>';
					}
				}
			?>
				</tbody>
			</table>
		</div>
	</div>
<script>
$(document).ready(function() {
    $('#table3').DataTable();
} );
</script>
<?php 
}
?>

<?php 
if($page == 'contact' && $isadmin == 'Admin' && $isadmin != 'Agency' && $isadmin != 'Company'){
?>
	<!-- connections -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"> All <strong>Querries</strong></h2><br>
			
			<table class="table table-bordered table-striped" id="table4">
				<thead>
				  <tr>
					<th>Company</th>
					<th>Time</th>
					<th>Chat</th>
					<th>Close</th>
				  </tr>
				</thead>
				<tbody>
			<?php
				include_once "functions/db.php";
				
				$sql = "SELECT DISTINCT Ticket FROM chatadm ORDER BY Doe DESC";
				$res = mysqli_query( $db, $sql );
				
				if( !is_bool($res) )
				{
					while($array = mysqli_fetch_array($res))
					{
						$sql2 = "SELECT Status,ChatFROM,ChatTO,Doe,MAX(Doe) FROM chatadm WHERE Ticket='".$array['Ticket']."'";
						$res2 = mysqli_query( $db, $sql2 );
						$array2 = mysqli_fetch_array($res2);
						if($array2['ChatTO'] == '1')
						{
							$client = $array2['ChatFROM'];
						}
						elseif($array2['ChatFROM'] == '1')
						{
							$client = $array2['ChatTO'];
						}
						$sql1 = "SELECT Company FROM clients WHERE ID=".$client;
						$res1 = mysqli_query( $db, $sql1 );
						$array1 = mysqli_fetch_array($res1);
						
						if($array2['Status'] == '1')
						{
							$button = '<a href="functions/closeticket.php?ticket='.$array['Ticket'].'"><button class="btn btn-lg btn-red btn-effect">Close</button></a>';
							$chatbtn = '<button type="submit" title="Chat" class="btn btn-lg btn-red btn-effect">Chat</button>';
						}
						elseif($array2['Status'] == '2')
						{
							$button = '<button class="btn btn-lg btn-success btn-effect">Closed</button>';
							$chatbtn = '<button class="btn btn-lg btn-success btn-effect">Closed</button>';
						}
						echo '<tr>
								<td>'.$array1['Company'].'</td>
								<td>'.date('m/d/Y : h:i a', $array2['Doe']).'</td>
								<td>
									<form id="chat" action="chatadm.php" method="post" target="_blank">
										<input type="hidden" name="ticket" value="'.$array['Ticket'].'">
										<input type="hidden" name="userto" value="'.$client.'">
									'.$chatbtn.'
									</form>
								</td>
								<td>'.$button.'</td>
							  </tr>';
					}
				}
			?>
				</tbody>
			</table>
		</div>
	</div>
<script>
$(document).ready(function() {
    $('#table4').DataTable();
} );
</script>
<?php 
}
?>
<?php 
if($page == 'blog' && $isadmin == 'Admin' && $isadmin != 'Agency' && $isadmin != 'Company'){
?>
	<!-- blog -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"><strong>Blog</strong></h2><br>
			<button class="btn btn-lg btn-red btn-effect" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Post</button><br>
			
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New Blog (image width should be restricted to 370px*)</h4>
				  </div>
				  <div class="modal-body"> 
					<form role="form" action="functions/newblog.php" method="post" enctype="multipart/form-data">
					  <div class="form-group">
						<label for="title">Blog Title:</label>
						<input type="text" class="form-control" name="title" required>
					  </div>
					  <div class="form-group">
						<label for="desc">Blog Description:</label>
						<textarea name="desc" class="form-control" required></textarea>
					  </div>
					  <div class="form-group">
						<label for="title">Blog Photo(width:370px only):</label>
						<input type="file" class="form-control" name="image" required>
					  </div>
					  <div class="form-group">
						<label for="title">Blog background Photo(width:1920px only):</label>
						<input type="file" class="form-control" name="image1" required>
					  </div>
					  <button type="submit" class="btn btn-lg btn-red btn-effect">Submit</button>
					</form>
				  </div>
				</div>

			  </div>
			</div>
			
			<table class="table table-bordered table-striped" id="table5">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Title</th>
					<th>Time</th>
					<th>View</th>
					<th>Delete</th>
				  </tr>
				</thead>
				<tbody>
			<?php
				include_once "functions/db.php";
				
				$sql = "SELECT * FROM blog ORDER BY Doe DESC";
				$res = mysqli_query( $db, $sql );
				
				if( !is_bool($res) )
				{
					while($array = mysqli_fetch_array($res))
					{
						echo '<tr>
								<td>'.$array['ID'].'</td>
								<td>'.$array['Title'].'</td>
								<td>'.date('m/d/Y : h:i a', $array['Doe']).'</td>
								<td><a href="detail.php?blog='.$array['ID'].'" target="_blank" class="btn btn-lg btn-success btn-effect">View</a></td>
								<td><a href="functions/deleteblg.php?blog='.$array['ID'].'" class="btn btn-lg btn-danger btn-effect">Delete</a></td>
							  </tr>';
					}
				}
			?>
				</tbody>
			</table>
		</div>
	</div>
<script>
$(document).ready(function() {
    $('#table5').DataTable();
} );
</script>
<?php 
}
?>