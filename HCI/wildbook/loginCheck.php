
<html>
<body>
	<?php
	include 'pinterestDB.php';
		session_start(); //must call session_start before using any $_SESSION variables

		$username = $_POST['user'];
		$password = $_POST['pswd'];
		
		
		
		//$username = mysql_real_escape_$username);
		$queryPassword = "SELECT password FROM user WHERE email ='$username';";
		
		$result = runQuery($queryPassword, 1);
		
		if(mysql_num_rows($result) < 1) //no such user exists
		{
			header('Location: login.html');
			
		} 
			
		
		$db_password = mysql_result($result, 0);
		
		echo $db_password;

		if($password != $db_password) //incorrect password
		{
				echo $username;
			    echo $password."_incorrect";
			header('Location: login.html');
		}else
		{
			validateUser(); //sets the session data for this user
			//echo 'User found';
			header('Location: home.php');
		}
		
		
		/* Store User email id in the Session */
		
		function validateUser()
		{
			session_regenerate_id (); //this is a security measure
			$_SESSION['valid'] = 1;
			$_SESSION['userid'] = $_POST['user'];
			
		}
	?>


</body>
</html>