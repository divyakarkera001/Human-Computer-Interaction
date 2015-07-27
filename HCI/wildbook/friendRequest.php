<?php include("header.php"); ?> 
	<?php
	if(isLoggedIn()!=1) //Not Signed In
	{
		header('Location: login.html');
	}
	?>
	<div class="contents">
		<form method="get" action="friendReqCheck.php">
			<table>
				<tr><td>Friend Email ID:</td><td><input type="text" name="requestedid"></td></tr>
				<tr><td>Greeting Message:</td><td><textarea name="greetingMessage" rows="3" cols="50"></textarea></td></tr>
				<tr><td/><td></td></tr>
				<tr><td/><td><input type="submit" value = "Send"><input type="button" value="Cancel" onClick="this.form.action='friendRequest.php';this.form.submit()"></td></tr>
			</table>
		</form>
	</div>
<?php include("footer.php"); ?>