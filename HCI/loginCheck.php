<?php
	session_start();
	require_once('dbConnection.php');
	openDbConnection();		
	$username1 = $_POST['email'];
	$password1 = $_POST['password'];
		//$username = mysql_real_escape_$username);
	$queryPassword = "";
	$sqlDisFeeCategory = <<<SQL
	SELECT * FROM tbl_user WHERE email ='$username1';
SQL;

	if(!$result2 = $db->query($sqlDisFeeCategory)){
		die('There was an error running the query [' . $db->error . ']');
	}
	while($row = $result2->fetch_assoc()){
	
		$db_password = $row['password'];
		$email = $row['email'];
		$userName = $row['username'];	
		$idUser = $row['id_user'];
		
	}
	closeDbConnection();
	
	

		if($password != $db_password) //incorrect password
		{
			echo 0;
			
		}else
		{
			echo 1;
			$_SESSION['email'] = $email;
			$_SESSION['userName'] = $userName;
			$_SESSION['idUser'] = $idUser;
			return ;
		}
		
		
		/* Store User email id in the Session */
		
		function validateUser()
		{
			//session_regenerate_id (); //this is a security measure
			$_SESSION['valid'] = 1;
			$_SESSION['userid'] = $_POST['email'];
			
		}
	?>
