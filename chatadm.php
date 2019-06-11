<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
	if( !isset($_SESSION['eMail']) )
	{
		header('Location: functions/logout.php');die;exit;
	}
	
	if( isset($_SESSION['eMail']) && ( (time() - $_SESSION['time']) >= 5*60 ))
	{
		header('Location: functions/logout.php');
	}
	else
	{
		$_SESSION['time'] = time();
		$isadmin = $_SESSION['IsAdmin'];
		$sessionid = $_SESSION['userID'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Voltajob Chat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<style>
	body
	{
		font-family: Lato;
	}
	.left
	{
		width: 50%;
		background: lightgray;
		float: left !important;
	}
	.right
	{
		width: 50%;
		background: lightgray;
		float: right !important;
	}
	.msg
	{
		position: fixed;
		left: 0;
		bottom: 0;
		height: 100px;
		width: 100%;
		overflow:hidden;
	}
	#chat
	{
		height: 500px;
		width: 100%;
		overflow-y: scroll;
	}
	</style>
	
	<script>
	$(document).on('keyup keypress', 'form input[type="text"]', function(e) {
	  if(e.which == 13) {
		e.preventDefault();
		return false;
	  }
	});
	</script>
	<script>
	setInterval(function(){ 
    showUser('<?php echo $_POST['ticket'];?>');    
	}, 1000);
	function showUser(str) {
		if (str == "") {
			document.getElementById("chat").innerHTML = "";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("chat").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","functions/getadmchat.php?q="+str,true);
			xmlhttp.send();
		}
	}
	</script>
	<script>
		$(document).ready(function() {
			$('#submit').click(function(e) {
				var msg = $('#msg').val();
				var comp = "<?php echo $_POST['userto'];?>";
				var ticket = "<?php echo $_POST['ticket'];?>";
				
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'functions/admchat.php',
					data: {msg: msg, comp: comp, ticket: ticket},
					success: function(data)
					{
						$("#msg").val("");
						var mydiv = $("#chat");
						mydiv.scrollTop(mydiv.prop("scrollHeight"));
					}
				});
			});
		});
	</script>
</head>
<body>

<div class="container">
<div class="well" id="chat"></div>
<div class="msg" id="sendbox">
<form autocomplete="off">
	<div class="form-group">
		<input style="width: 100%;" type="text" class="form-control" id="msg" required>
	</div>
  <a type="submit" id="submit" style="width:100%;" class="btn btn-lg btn-success">Send</a>
</form>
</div>
</div>
</body>
</html>