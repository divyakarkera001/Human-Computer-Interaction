<?php
include 'pinterestSession.php';
include 'pinterestDB.php';

//Get UserID 
$userEmail = getUserID();
//echo $userEmail;
$userIDQuery = "select u_id from user where email = '$userEmail';";
//echo $userIDQuery;
$res = runQuery($userIDQuery,1);
$userID = mysql_result($res, 0);
//echo $userID;

//Get Data From Form
		//$username = $_POST["username"]; 
		$password = $_POST["userpassword"]; 
		$dob = $_POST["user_dob"]; 
		$introduction = $_POST["about"]; 
		$address = $_POST["location"]; 
		$ph_num = $_POST["phone_number"]; 
		
//Get Notification		
//$saveEditQuery = "UPDATE user SET pwd  ='$userpassword', firstname = '$userFirstName', lastname = '$userLastName', about_user = '$aboutUser', location ='$userLocation', website = '$userWebsite', languages ='$userLanguage', ountry='$userCountry', gender = '$userGender' where uid = '$userID';";
$saveEditQuery = "UPDATE user SET password = '$password',dob = '$dob',introduction = '$introduction',address ='$address',ph_num ='$ph_num' where u_id = '$userID';";
echo $saveEditQuery;
$result = runQuery($saveEditQuery,0);

//echo 'Updated Successfully';
header('Location: editProfile.php');

?>