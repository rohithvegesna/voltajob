<!--Agency-->	

<?php 
if($page == null && $isadmin == 'Agency' && $isadmin != 'Company' && $isadmin != 'Admin'){
?>
	<!-- Jobs -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"> Job <strong>Posts</strong></h2>
			<h4 class="text-center">Related jobs</h4><hr>
			<div class="listing row js-latestPosts">
				
				<?php
					include_once "functions/db.php";
					
					$sql = "SELECT * FROM jobs WHERE Status=1 ORDER BY Doe DESC";
					$res = mysqli_query( $db, $sql );
					
					if( !is_bool($res) )
					{
						while($array = mysqli_fetch_array($res))
						{
							$sql1 = "SELECT * FROM connection WHERE Status=1 AND JobID='".$array['ID']."' AND AgencyID=".$sessionid;
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
							echo '<div class="col-xs-6 col-sm-4 i">
										<div class="c">
											<div class="wrapInfo">
												<h3>
													<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal'.$array['ID'].'" title="'.$array['Title'].'">'.$array['Title'].'</a>
												</h3>
												<div class="info">
													<span class="sprite icon icon-calendar"></span>
													<div class="date">'.date('jS F Y', $array['Doe']).'</div>
												</div>
											</div>
										</div>
									</div>
									
									<!-- Modal -->
									<div id="myModal'.$array['ID'].'" class="modal fade" role="dialog">
									  <div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Job Details</h4>
										  </div>
										  <div class="modal-body">
											<p>Title: '.$array['Title'].'<br>
											No of positions: '.$array['Nop'].'<br>
											Location: '.$array['Loc'].'<br>
											No of days: '.$array['Days'].'<br>
											Amount: '.$array['Amount'].' '.$array['Type'].'<br>
											Description:
											<div id="editor'.$array['ID'].'" class="form-control" style="height:100%;font-weight:normal;font-size:inherit;"></div>
												
												<!-- Initialize Quill editor -->
												<script>
												var options = {
												  theme: "bubble"
												};
												var quill'.$array['ID'].' = new Quill("#editor'.$array['ID'].'", options);
												quill'.$array['ID'].'.setContents('.$array['Des'].');
												quill'.$array['ID'].'.enable(false);
												</script>
											</p>
										  </div>
										  <div class="modal-footer">
											'.$button.'
										  </div>
										</div>

									  </div>
									</div>';
						}
					}
				?>
				
			</div><br>
			<!--<div class="row">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4">
						<a href="#" title="#" class="btn btn-lg btn-red btn-effect">+ more posts...</a>
					</div>
				</div>-->
		</div>
	</div>
<?php 
}
?>

<!--Agency-->	

<?php 
if($page == 'selectedjobs' && $isadmin == 'Agency' && $isadmin != 'Company' && $isadmin != 'Admin'){
?>
	<!-- Selected Jobs -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"> Selected <strong>Jobs</strong></h2>

			<div class="listing row js-latestPosts">
				
				<?php
					include_once "functions/db.php";
					
					$sql = "SELECT * FROM connection WHERE Status=1 AND AgencyID='".$sessionid."' ORDER BY Doe DESC";
					$res = mysqli_query( $db, $sql );
					
					if( !is_bool($res) )
					{
						while($array = mysqli_fetch_array($res))
						{
							$sql1 = "SELECT * FROM jobs WHERE Status=1 AND ID=".$array['JobID'];
							$res1 = mysqli_query( $db, $sql1 );
							$array1 = mysqli_fetch_array($res1);
							$sql2 = "SELECT * FROM clients WHERE Status=1 AND ID=".$array1['CompanyID'];
							$res2 = mysqli_query( $db, $sql2 );
							$array2 = mysqli_fetch_array($res2);
							if($array['Status'] == '1')
							{
								$status = "<storng style='color:green'>Success</strong>";
							}
							else
							{
								$status = "<storng style='color:red'>Pending</strong>";
							}
							
							echo '<div class="col-xs-6 col-sm-4 i">
										<div class="c">
											<div class="wrapInfo">
												<h3>
													<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal'.$array['ID'].'" title="'.$array1['Title'].'">'.$array1['Title'].'</a>
												</h3>
												<div class="info">
													<span class="sprite icon icon-calendar"></span>
													<div class="date">'.date('jS F Y', $array['Doe']).'</div>
													<div class="author">Status: '.$status.'</div>
												</div>
											</div>
										</div>
									</div>
									
									<!-- Modal -->
									<div id="myModal'.$array['ID'].'" class="modal fade" role="dialog">
									  <div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Job Details</h4>
										  </div>
										  <div class="modal-body">
											<p>Title: '.$array1['Title'].'<br>
											No of positions: '.$array1['Nop'].'<br>
											No of days to close: '.$array1['Days'].'<br>
											Location: '.$array1['Loc'].'<br>
											Type: '.$array1['Type'].'<br>
											Role: '.$array1['Role'].'<br>
											Position: '.$array1['Position'].'<br>
											Level: '.$array1['Level'].'<br>
											Category: '.$array1['Cat'].'<br>
											Designation: '.$array1['Design'].'<br>
											Industry: '.$array1['Ind'].'<br>
											Amount: '.$array1['Amount'].' '.$array1['Type'].'<br>
											<strong>Contact Person</strong>: '.$array2['FullName'].'<br>
											<strong>Phone</strong>: '.$array2['Mobile'].'<br>
											<strong>Email</strong>: '.$array2['Email'].'<br>
											Description: <br>
											<div id="editor'.$array['ID'].'" class="form-control" style="height:100%;font-weight:normal;font-size:inherit;"></div>
												
												<!-- Initialize Quill editor -->
												<script>
												var options = {
												  theme: "bubble"
												};
												var quill'.$array['ID'].' = new Quill("#editor'.$array['ID'].'", options);
												quill'.$array['ID'].'.setContents('.$array1['Des'].');
												quill'.$array['ID'].'.enable(false);
												</script>
											</p>
										  </div>
										  <div class="modal-footer">
											<form id="chat" action="chat.php" method="post" target="_blank">
												<input type="hidden" name="chat" value="'.$array['ID'].'">
												<input type="hidden" name="userto" value="'.$array1['CompanyID'].'">
												<button type="submit" title="Chat" class="btn btn-lg btn-red btn-effect">Chat</button>
											</form>
										  </div>
										</div>

									  </div>
									</div>';
						}
					}
				?>
				
			</div>
			<!--<div class="row">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4">
						<a href="#" title="#" class="btn btn-lg btn-red btn-effect">+ more posts...</a>
					</div>
				</div>-->
		</div>
	</div>
<?php 
}
?>