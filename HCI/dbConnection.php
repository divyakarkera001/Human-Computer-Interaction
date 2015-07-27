<?php
$dbendpoint = "localhost";
$username = "root";
$password = "123456";
$database = "chronos";
$db;
function openDbConnection(){
	global $db,$dbendpoint,$username,$password,$database;
	$db = mysqli_connect($dbendpoint,$username,$password,$database);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	error_reporting(E_ALL);
}

function closeDbConnection(){
	global $db;
	$db->close();
}




?>