<!--Company-->	

<?php 
if($page == null && $isadmin == 'Company' && $isadmin != 'Agency' && $isadmin != 'Admin'){
?>
	<!-- Posted Jobs -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/briefcase.png" alt="" width="64" height="64"> Job <strong>Posts</strong></h2>

			<div class="listing row js-latestPosts">
				
				<?php
					include_once "functions/db.php";
					$sql = "SELECT * FROM jobs WHERE CompanyID='".$sessionid."' ORDER BY Doe DESC";
					$res = mysqli_query( $db, $sql );
					
					if( !is_bool($res) )
					{
						while($array = mysqli_fetch_array($res))
						{
							if($array['Status'] == '1'){
								$status = "<strong style='color:green;'>Success</strong>";
							}
							elseif($array['Status'] == '2'){
								$status = "<strong style='color:darkblue;'>Pending</strong>";
							}
							elseif($array['Status'] == '3'){
								$status = "<strong style='color:red;'>Rejected</strong>";
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
											<p>Title: '.$array['Title'].'<br>
											No of positions: '.$array['Nop'].'<br>
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
											<a type="button" href="functions/deletejob.php?id='.$array['ID'].'" class="btn btn-lg btn-red btn-effect">Delete</a>
										  </div>
										</div>

									  </div>
									</div>';
						}
					}
				?>
				
			</div>
			<?php
				include_once "functions/db.php";
				$sql = "SELECT COUNT(*) FROM jobs WHERE CompanyID=".$sessionid;
				$res = mysqli_query( $db, $sql );
				
				if( !is_bool($res) )
				{
					while($array = mysqli_fetch_array($res))
					{
						if($array['COUNT(*)'] == '0')
						{
							echo '<div class="row">
										<div class="col-xs-12 col-sm-4 col-sm-offset-4">
											<a href="?page=newjob" title="#" class="btn btn-lg btn-red btn-effect">Post a job</a>
										</div>
									</div>';
						}
						elseif($array['COUNT(*)'] >= '7')
						{
							echo '<br><br><div class="row">
										<div class="col-xs-12 col-sm-4 col-sm-offset-4">
											<a href="#" title="#" class="btn btn-lg btn-red btn-effect">+ more posts...</a>
										</div>
									</div>';
						}
						else{}
					}
				}
			?>
		</div>
	</div>
<?php 
}
?>

<?php 
if($page == 'newjob' && $isadmin == 'Company' && $isadmin != 'Agency' && $isadmin != 'Admin'){
?>
	<!-- New job post -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/megaphone.png" alt="" width="64" height="64"> New <strong>Job</strong></h2>

			<div class="listing row js-latestPosts">
				<div class="col-sm-12 i">
					<div class="mainForm js-contactForm">
						<div class="row">
							<form action="functions/newjob.php" method="post">
								<div class="col-xs-12 col-lg-12">
									<div class="row">
										<div class="col-sm-12 i">
											<div class="input">
												<input type="text" name="title" class="form-control input-field" required>
												<label class="input-label">
													<span class="input-label-content">Job Title</span>
												</label>
											</div>
										</div>
										<div class="col-sm-12 i">
											<div class="input">
												<input type="number" name="nop" min="1" class="form-control input-field" required>
												<label class="input-label">
													<span class="input-label-content">No of positions</span>
												</label>
											</div>
										</div>
										<div class="col-sm-12 i">
											<div class="col-sm-6">
												<div class="input">
													<input type="number" name="days" class="form-control input-field" min="1" max="365" required>
													<label class="input-label">
														<span class="input-label-content">No of days to close</span>
													</label>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="input">
													<input type="text" name="loc" class="form-control input-field" required>
													<label class="input-label">
														<span class="input-label-content">Location</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-sm-12 i">
										<div class="col-sm-6">
											<div class="input">
												<input type="number" name="amount" class="form-control input-field" min="1" required>
												<label class="input-label">
													<span class="input-label-content">Amount/Percent payed after completion</span>
												</label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input">
												<select name="type" class="form-control input-field" required>
													<option value="lumpsum">Lumpsum</option>
													<option value="percent">Percent per candidate</option>
												</select>
												<label class="input-label">
													<span class="input-label-content">Percent/Lumpsum</span>
												</label>
											</div>
										</div>
										</div>
										<div class="col-sm-12 i">
										<div class="col-sm-6">
											<div class="input">
												<select name="role" class="form-control input-field" required>
													<option value="IT">IT</option>
													<option value="NONIT">NON - IT</option>
													<option value="BOTH">BOTH</option>
												</select>
												<label class="input-label">
													<span class="input-label-content">What kind of Roles does this job belong to ?</span>
												</label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input">
												<select name="position" class="form-control input-field" required>
													<option value="Permanent">Permanent</option>
													<option value="Contract">Contract</option>
													<option value="Both">Both</option>
												</select>
												<label class="input-label">
													<span class="input-label-content">Type of Positions</span>
												</label>
											</div>
										</div>
										</div>
										<div class="col-sm-12 i">
										<div class="col-sm-6">
											<div class="input">
												<select name="level" class="form-control input-field" required>
													<option value="Entry Level">Entry Level</option>
													<option value="Mid Level">Mid Level</option>
													<option value="Senior/Executive Positions">Senior/Executive Positions</option>
													<option value="Leadership Roles">Leadership Roles</option>
												</select>
												<label class="input-label">
													<span class="input-label-content">Please select the level of roles you like source candidates</span>
												</label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input">
												<select name="cat" id="cat" class="form-control input-field" required>
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
												<label class="input-label">
													<span class="input-label-content">Please specify the strengths required in terms of JOB SKILLS</span>
												</label>
											</div>
										</div>
										</div>
										<div class="col-sm-12 i">
										<div class="col-sm-6">
											<div class="input">
												<input type="text" name="design" class="form-control input-field" required>
												<label class="input-label">
													<span class="input-label-content">Designation</span>
												</label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input">
												<select name="ind" class="form-control input-field">
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
												<label class="input-label">
													<span class="input-label-content">Type of Industry</span>
												</label>
											</div>
										</div>
										</div>
										<div class="col-sm-12 i">
											<div class="input textform">
												<input type="hidden" name="desc" id="desc" value="" class="form-control input-field" required>
												<div id="editor" class="form-control" style="height:250px;font-weight:normal;font-size:inherit;"></div>
												
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
										</div>
										<div class="col-xs-12 i">
											<button type="submit" id="submit" class="btn btn-red submit btn-effect">Post a job</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
}
?>

<?php 
if($page == 'agencycontact' && $isadmin == 'Company' && $isadmin != 'Agency' && $isadmin != 'Admin'){
?>
	<!-- Agency Contact -->
	<div class="section gray latestPosts">
		<div class="container">
			<h2 class="text-center"><img src="img/icons/sub.png" alt="" width="64" height="64"> Agency <strong>Contact</strong></h2>

			<div class="listing row js-latestPosts">
			<?php
				include_once "functions/db.php";
				$sql = "SELECT DISTINCT ChatID FROM chat WHERE ChatTO='".$sessionid."' OR ChatFROM='".$sessionid."'";
				$res = mysqli_query( $db, $sql );
				
				if( !is_bool($res) )
				{
					while($array = mysqli_fetch_array($res))
					{
						$sql1 = "SELECT ChatTO,ChatFROM,MAX(Doe),Doe FROM chat WHERE ChatID='".$array['ChatID']."' AND (ChatTO='".$sessionid."' OR ChatFROM='".$sessionid."') GROUP BY ID";
						$res1 = mysqli_query( $db, $sql1 );
						$array1 = mysqli_fetch_array($res1);
						
						if($sessionid == $array1['ChatTO'])
						{
							$to = $array1['ChatFROM'];
						}
						else
						{
							$to = $array1['ChatTO'];
						}
						$sql2 = "SELECT Company FROM clients WHERE ID=".$to;
						$res2 = mysqli_query( $db, $sql2 );
						$array2 = mysqli_fetch_array($res2);
						$sql3 = "SELECT Title FROM jobs WHERE ID=(SELECT JobID FROM connection WHERE ID='".$array['ChatID']."')";
						$res3 = mysqli_query( $db, $sql3 );
						$array3 = mysqli_fetch_array($res3);
						echo '<div class="col-xs-6 col-sm-4 i">
									<div class="c">
										<div class="wrapInfo">
											<h3>
											<form id="chat" action="chat.php" method="post" target="_blank">
												<input type="hidden" name="chat" value="'.$array['ChatID'].'">
												<input type="hidden" name="userto" value="'.$to.'">
												<button type="submit" title="Chat" class="btn btn-lg btn-red btn-effect">'.$array3['Title'].'</button>
											</form>
											</h3>
											<div class="info">
												<span class="sprite icon icon-calendar"></span>
												<div class="date">'.date('jS F Y', $array1['Doe']).'</div>
												<div class="author">name: <a href="detail.php" title="#">'.$array2['Company'].'</a></div>
											</div>
										</div>
									</div>
								</div>';
					}
				}
			?>				
			</div>
		</div>
	</div>
<?php 
}
?>