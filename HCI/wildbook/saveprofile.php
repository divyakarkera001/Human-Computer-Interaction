<!DOCTYPE HTML>
<html>
<head>
<title>Pin-UP</title>
<link rel="stylesheet" type="text/css" href="css/common.css"></link>
<link rel="icon" type="image/x-icon" href="img/favicon.ico"/>
<script src="js/jquery.js"></script>
</head>
<body>
	<div class="header clearfix" style="text-align:center">
		<div class="headerLft">
		<a class="logoLink"  href="home.php" style="float:none;background:none;">
			<span style="float:none;">Pin-up</span>
		</a>
		</div>
	</div>
	<div class="accConf">
	<?php
		include 'pinterestDB.php';

		$username = $_POST["email"]; 
		$userpassword = $_POST["userpassword"]; 
		$userImageLocation = "img/default_user.png";

		$maxUIdQuery = "select max(u_id) as maxUId from user";
		$resultUId=runQuery($maxUIdQuery,1);
		while($row = mysql_fetch_array($resultUId))
		{
			$Uid = $row['maxUId'];
			//echo $Uid;
		}
		$Uid++;

		$UserExist = 0;

		$chkUserExistQuery = "select u_id as UID from user where email = '$UMail'";
		//echo $
		$resultUIdExist=runQuery($chkUserExistQuery,1);
		while($row = mysql_fetch_array($resultUIdExist))
		{
			$UserExist ++;
			//echo $Uid;
		}
		if( $UserExist > 0 )
		{
			echo "User with this email Id exists";
		}
		else
		{
			$userInsertQuery = "insert into user (u_id, email, password) values ('$Uid','$username', '$userpassword')";
			$result=runQuery($userInsertQuery,0);
		  	echo "Profile Created Successfully!!!";
		}

		/*$sql="INSERT INTO user (email, pwd, firstname, lastname, country, gender, image_location) 
		values 
		('$username','$userpassword','$userFirstName','$userLastName','$userCountry', '$userGender', '$userImageLocation')";

		if (!mysql_query($sql, $conn))
		  {
		  die('Could not save data: ' . mysql_error());
		  }*/
	?>
	<div>
		Click here to  &nbsp;<input class="buttonTab" type="submit" onClick="window.location.href='login.html'" value="Log In >>"/>
	</div>
	</div>
</body>
</html>