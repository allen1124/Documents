<?php
$nickname = $_GET['nickname'];
$dob = $_GET['dob'];
$dob = DateTime::createFromFormat('Y-m-d', $dob);
$age = date('Y') - $dob->format("Y");
if ($age == 1 || $age == 21 || $age == 31) {
	$sup = "st";
} elseif ($age == 2 || $age == 22) {
	$sup = "nd";
} elseif ($age == 3 || $age == 23) {
	$sup = "rd";
} else {
	$sup = "th";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<meta content="telephone=no" name="format-detection"/>
	<title>Email from Information Systems Association BEA HKUSU</title>

	<style>
		.ExternalClass * {
			line-height: 100%;
		}

		a {
			color: rgb(140, 56, 67);
			text-decoration: underline
		}

		p {
			padding: 0 !important;
			margin: 0 !important;
			font-family: 'Myriad Pro', Helvetica, 'Segoe UI', Arial, sans-serif		}

	</style>
</head>
<body style="padding: 0 !important;
	margin: 0 !important;
	display: block !important;
	-webkit-text-size-adjust: none;
	background-image: url(http://www.hkuisa.hkusu.hku.hk/email/capriccio/background.jpg);
	background-position: 0 0;
	background-repeat: repeat;
	font-family: 'Myriad Pro', Helvetica, 'Segoe UI', Arial, sans-serif; font-size: 12px;">

<table width="100%" border="0" cellspacing="0" cellpadding="0"       style="background-image: url(http://www.hkuisa.hkusu.hku.hk/email/capriccio/background.jpg);
	       background-position: 0 0;
	       background-repeat: repeat;
	       font-size: 14px;
	       color: #313131;">
	<tr>
		<td align="center" valign="top">

			<table width="625" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="87" valign="top" class="img"
					    style="font-size:0;
					    line-height:0;
					    text-align:left">

						<div style="font-size:0; line-height:0;  height:6px"></div>
						<img src="http://www.hkuisa.hkusu.hku.hk/email/logo.png"
						     alt="Information Systems Association BEA HKUSU" border="0" width="527" height="73"/>

					</td>
					<td valign="bottom" align="right">&nbsp;</td>
				</tr>
			</table>

			<table width="624" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="624" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<div class="img" style="font-size:0; line-height:0;  text-align:left">
										<img src="http://www.hkuisa.hkusu.hku.hk/email/capriccio/mainbox_top.jpg"
										     alt="" border="0" width="624" height="7"/>
									</div>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td class="img" style="font-size:0; line-height:0;  text-align:left"
											    width="1"></td>
											<td class="img" style="font-size:0; line-height:0;  text-align:left"
											    width="1"></td>
											<td bgcolor="#fff">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">

																										<tr>
														<td class="img" width="15"
														    style="font-size: 0; line-height: 0; text-align: left; color: #1E1E1E;">
														</td>
														<td style=" padding-top: 12px;">
															<p style="line-height:18px;" align="justify">Dear <?php echo $nickname; ?>,<br /><br />Happy <?php echo $age; ?><sup><?php echo $sup; ?></sup> Birthday! Have a wonderful birthday and an even better year!<br /><br />An ISA e-card is made for you on this special occasion:<br /><br /><br /><a href="http://www.hkuisa.hkusu.hku.hk/bday" target="_blank" style="text-decoration:none; font-size:26px; color:white; background-color:rgb(140, 56, 67); padding:12px 12px 7px 12px; border-color:rgb(140, 56, 67); border:1px; border-radius: 3px; box-shadow:0 0 5px #888888">Happy Birthday!</a><br /><br /><br />Hope you would like the e-card!<br /><br />We wish you a year filled with joy and happiness!<br /><br /><br />Best Wishes,<br /><br />CHEUNG Hoi Ching, Peony<br />Internal Vice-President 2016 - 2017.</p>
														</td>
														<td class="img" width="15"
														    style="font-size:0; line-height:0;  text-align:left">
														</td>
													</tr>

												</table>
												<div style="font-size:0; line-height:0;  height:40px"></div>
												<div
													style="font-size:0; line-height:0;  height:1px; background:#e5e5e5; "></div>
												<div
													style="font-size:0; line-height:0;  height:1px; background:#ffffff; "></div>
												<div class="img" style="font-size:0; line-height:0;  text-align:left">
													<img src="http://www.hkuisa.hkusu.hku.hk/email/socials_top_shadow.jpg"
													     alt="" border="0" width="620" height="18"/>
												</div>
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td align="center">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>

	<td class="img" style="font-size:0; line-height:0; text-align:left" width="27">
		<a href="http://www.facebook.com/hkuisa" target="_blank">
			<img src="http://www.hkuisa.hkusu.hku.hk/email/capriccio/facebook.png" alt="Facebook" border="0" width="30" height="30"/>
		</a>
	</td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class="img" style="font-size:0; line-height:0; text-align:left" width="27">
		<a href="http://www.hku.hk/hkuisa" target="_blank">
			<img src="http://www.hkuisa.hkusu.hku.hk/email/capriccio/web.png" alt="Website" border="0" width="30" height="30"/>
		</a>
	</td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class="img" style="font-size:0; line-height:0; text-align:left" width="27">
		<a href="mailto:hkuisa@hku.hk" target="_blank">
			<img src="http://www.hkuisa.hkusu.hku.hk/email/capriccio/mail.png" alt="Email" border="0" width="30" height="30"/>
		</a>
	</td>
																	</tr>
															</table>
														</td>
													</tr>
												</table>
												<div style="font-size:0; line-height:0;  height:20px"></div>
											</td>
											<td class="img" style="font-size:0; line-height:0;  text-align:left"
											    width="1"></td>
											<td class="img" style="font-size:0; line-height:0;  text-align:left"
											    width="1"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<!-- END Main Box -->
						<div class="img-center" style="font-size:0; line-height:0;  text-align:center"><img
								src="http://www.hkuisa.hkusu.hku.hk/email/capriccio/footer_top.jpg"
								alt="" border="0" width="625" height="15"/>
						</div>
					</td>
				</tr>
			</table>
			<p>

			</p>
			<div class="footer" style="color: rgb(255,255,255) !important; font-family: 'Myriad Pro', Helvetica, 'Segoe UI', Arial, sans-serif; font-size: 14px; line-height: 15px; text-align: center">
				<div></div>
				<div>
					<p style="color: rgb(255,255,255)"><br/>
						Blends People with Quality<br/>
						<br/>
						Information Systems Association<br/>
						Business and Economics Association<br/>
						Hong Kong University Students' Union<br/>
						<br/>
						<a href="http://www.hku.hk/hkuisa/" target="_blank" class="link4-u" style="color:rgb(255,255,255); text-decoration:underline"><span class="link4-u" style="color:rgb(255,255,255); text-decoration:underline">www.hku.hk/hkuisa</span></a> | <a href="mailto:hkuisa@hku.hk" class="link4-u" style="color:rgb(255,255,255); text-decoration:underline"><span class="link4-u" style="color:rgb(255,255,255); text-decoration:underline">hkuisa@hku.hk</span></a>
					</p>
				</div>
				<div style="font-size:0; line-height:0;  height:10px"></div>

			</div>
		</td>
	</tr>
</table>

</body>
</html>
