<script>
	function showNews() { 
	var emailn = $('#emlnews').val();
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtNews").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET","functions/newsletter.php?news="+emailn,true);
		xmlhttp.send();
	}
</script>

	<footer id="footer">
		<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-4 i">
						<h2>Voltajob</h2>
						<div class="content">
							B2 – 306<br />
							SNN, Begur Road<br />
							Bangalore, KA<br />
							India<br />
							<a href="tel:08048900147" title="Call Us">Ph: 08048900147</a>
							<a href="mailto:contact@voltajob.com" title="Contact Us">Email: contact@voltajob.com</a>
						</div>
					</div>
					<div id="txtNews" class="col-xs-6 col-sm-4 i">
						<h2>Newsletter</h2>
						<p>Get the latest news via email:</p>
						<form id="form" autocomplete="off">
							<input type="email" id="emlnews" class="form-control">
							<a onclick="showNews();" class="submit sprite"></a>
						</form>
					</div>
					<div class="col-xs-6 col-sm-4 i">
						<h2>Follow</h2>
						<p>Get close to us</p>

						<div class="socials">
							<a href="#" title="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" title="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" title="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
							<a href="#" title="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 i">Copyright © <?php echo date('Y');?> <a href="http://ngcn.co.uk/" target="_blank" title="NGCN">NGCN</a></div>
					<div class="col-xs-6 i"><a href="terms.php" target="_blank">Terms&#38;Conditions</a>, <a href="privacy.php" target="_blank">Privacy Policy</a></div>
				</div>
			</div>
		</div>
	</footer>