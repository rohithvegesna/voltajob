<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();

	include_once('db.php'); 
	
	$num = mysqli_real_escape_string($conn, $_GET['num']);
	
	echo '<h2 class="text-center">Latest <strong>Posts</strong></h2>
			<div class="listing row js-latestPosts">';
	$sql = "SELECT * FROM blog ORDER BY Doe DESC LIMIT 0,".$num;
	$res = mysqli_query( $db, $sql );
	
	if( !is_bool($res) )
	{
		while($array = mysqli_fetch_array($res))
		{
			echo '<div class="col-xs-6 col-sm-4 i">
					<div class="c">
						<a href="detail.php?blog='.$array['ID'].'" title="#">
							<img src="data:image/jpeg;base64,'.base64_encode( $array['Photo'] ).'" alt="#" width="370" height="280" class="img-responsive">
						</a>
						<div class="wrapInfo">
							<h3>
								<a href="detail.php?blog='.$array['ID'].'" title="Blog">'.$array['Title'].'</a>
							</h3>
							<div class="info">
								<span class="sprite icon icon-calendar"></span>
								<div class="date">'.date('jS F Y', $array['Doe']).'</div>
								<div class="author">By: <a href="detail.php?blog='.$array['ID'].'" title="#">Voltajob</a></div>
							</div>
						</div>
					</div>
				</div>';
		}
	}
	echo '</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-sm-offset-4">
					<a onclick="showUser('.($num+10).')" title="More" class="btn btn-lg btn-red btn-effect">+ 10 more posts...</a>
				</div>
			</div>';