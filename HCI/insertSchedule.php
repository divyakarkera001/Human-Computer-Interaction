<?php
	session_start();
	require_once('dbConnection.php');
	openDbConnection();	
	$userId = $_SESSION['idUser'];
	parse_str($_POST['formdata'], $formdata);//This will convert the string to array
	$subject = $formdata['subject'];
	//values to be inserted in database table
	$subject = '"'.$formdata['subject'].'"';
	$dateFrm = '"'.$formdata['dateFrm'].'"';
	$dateTo = '"'.$formdata['dateTo'].'"';
	$timeFrm = '"'.$formdata['timeFrm'].'"';
	$timeTo = '"'.$formdata['timeTo'].'"';
	$day = '"'.$_POST['day'].'"';
	$sql="INSERT INTO `tbl_class` ( `course_name`, `start_date`, `end_date`,`day` ,`id_user`, `startTime`, `endTime`)VALUES ($subject, $dateFrm, $dateTo, $day, $userId , $timeFrm, $timeTo)";
	//MySqli Insert Query
	$insert_row = mysqli_query($db,$sql);

	if($insert_row){
		print 'Successfully Added the course into your Study Table '; 
	}else{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}

	closeDbConnection();

?>