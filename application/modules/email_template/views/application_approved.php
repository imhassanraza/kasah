<?php $this->load->view('email_template/header') ?>

<tr>
	<tr><td bgcolor="#f7f7f7" height="40"></td></tr>
	<td bgcolor="f7f7f7">
		<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="mainContent">
			<tbody>
				<tr align="right">
					<td class="h-t" align="right" mc:edit="title1" style="color: #333; font-size:2em; font-family:Franklin Gothic;font-weight:300;font-weight: normal;
					text-transform:uppercase; padding-right:10px; text-align: center;">
					<span style="    border-bottom: 3px solid #d41e34;padding-bottom: 6px;">Application Approved</span>
				</td>
			</tr>
			<tr>
				<td height="20"></td>
			</tr>
		</tbody>
	</table>
	<!--news-inner-->
	<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="container-middle">

		<tr>
			<td>
				<table style="border:1px solid #ddd; width: 100%" bgcolor="ffffff" border="0"  height="260" align="left" cellpadding="0" cellspacing="0">
					<tr>
						<td height="40">
						</td>
					</tr>
					<tr align="left">
						<td style="color:#000;font-family:Franklin Gothic; font-size:1.3em;padding-left:25px;">
							Hi ,
						</td>
					</tr>
					<tr>
						<td class="new-text" style="font-family:Franklin Gothic; font-size:15px;color:#000;padding: 0em 1.7em;line-height:1.9em;">
							<p>Your Applicaition has been approved by Team Kasah.</p>
							</td>
						</tr>
						<tr>
							<td class="new-text" style="font-family:Franklin Gothic; font-size:15px;color:#000;padding: 0em 1.7em;line-height:1.9em;">
								<p>Regards,<br>
									Team Kasah</p>
								</td>
							</tr>
							<tr>
								<td height="60">
								</td>
							</tr>

						</table>


					</td>
				</tr>

			</table>
			<!--//news-inner-->

		</td>
		<tr><td bgcolor="#f4f4f4" height="60"></td></tr>
	</tr>
	<!--Gallery-->

	<!-- footer -->
	<?php $this->load->view('email_template/footer') ?>
</table>

</td>
</tr>
</table>
</body>
</html>
