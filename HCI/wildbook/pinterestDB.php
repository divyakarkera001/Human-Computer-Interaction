<?php

function runQuery($sqlQuery, $resultRequired)
{	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'passwd';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('wildbook');

	if($resultRequired == 1)
	{
		$result = mysql_query($sqlQuery, $conn);
		mysql_close($conn);
		return $result;
	}else
	{
		mysql_query($sqlQuery, $conn);
		mysql_close($conn);
	}
	
}

?>