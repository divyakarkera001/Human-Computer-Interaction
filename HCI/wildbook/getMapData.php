<?php
		include 'pinterestDB.php';
		session_start();
		$locationList = "";
		$locationQuery = "select loc_lat as Lat, loc_long as Lng, location_name as LocName from activity";
		//echo $locationQuery;
		$resultLocations = runQuery($locationQuery, 1);
		//echo $resultLocations;
		while($row = mysql_fetch_array($resultLocations))
		{
			//echo 'a';
			//$locationList = $locationList.',';
			if($row['Lat'] != 999)
				$locationList = $locationList.$row['Lat'].','.$row['Lng'].','.$row['LocName'].':';
		}
		echo $locationList;
?>