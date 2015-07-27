<?php
session_start();
require_once('dbConnection.php');
$idUser = $_SESSION['idUser'];
$course = $_POST['course'];
openDbConnection();
$sqlStatus = <<<SQL
	select * from tbl_class where id_user='$idUser' and course_name='$course';
SQL;
$dataArry = array();
if(!$result = $db->query($sqlStatus)){
		die('There was an error running the query [' . $db->error . ']');
	}
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
			$dataArry['datepickerFrm'] = $row['start_date'];
			$dataArry['datepickerTo'] = $row['end_date'];
			$dataArry['timeFrom'] = $row['startTime'];	
			$dataArry['timeTo'] = $row['endTime'];
			$dataArry['day'] = $row['day'];
		}
	}
	echo json_encode($dataArry);
	$result->close();

	closeDbConnection();

?>