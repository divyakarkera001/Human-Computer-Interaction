<?php
include 'pinterestDB.php';
include 'pinterestSession.php';
		
		
		if(isLoggedIn()!=1) //Not Signed In
		{
			header('Location: login.html');
		}
		
		$userid=$_SESSION['userid'];
		$boardID = $_GET['bid'];
		$PostDescription = $_GET['desp'];
		$Link = $_GET['link'];
		$imgSrc="content/".$_GET['filename'];
		$title=$_GET['title'];
		$access=$_GET['access'];
		$lat=$_GET['lat'];
		$lng=$_GET['lng'];
		$location=$_GET['location'];
		
		//$query="call PinCreated('".$PinDescription."','".$Link."','".$boardID."','".$imgSrc."','".$userid."')";
		$post_Count_Query="select max(p_id) as maxPId from post";
		$result_Post_Count=runQuery($post_Count_Query,1);
		while($row = mysql_fetch_array($result_Post_Count))
		{
			$post_Count = $row['maxPId'];
		}
		$post_Count = $post_Count + 1;
		$uid_Query = "select u_id as UID from user where email = '$userid'";
		//echo $uid_Query;
		$result_u_id=runQuery($uid_Query,1);
		while($row = mysql_fetch_array($result_u_id))
		{
			$u_id = $row['UID'];
			//echo $u_id;
		}
		$today = date("Y-m-d");
		//echo $today

		$post_Insert_Query = "insert into post values ($post_Count, $u_id, '$title', '$today', $access, 0)";
		runQuery($post_Insert_Query,0);

		$postContent_Count_Query="select max(pc_id) as maxPCId from post_content";
		$result_PostContent_Count=runQuery($postContent_Count_Query,1);
		while($row = mysql_fetch_array($result_PostContent_Count))
		{
			$postContentCount = $row['maxPCId'];
			//echo $post_Count;
		}

		if($imgSrc != 'content/')
		{
			$postContentCount++;
			$PCImgInsertQuery = "insert into post_content values ($postContentCount, $post_Count, '$imgSrc', 0, 'pic')";
			runQuery($PCImgInsertQuery,0);
			//echo $PCImgInsertQuery;
		}
		if($PostDescription != "")
		{
			$postContentCount++;
			//echo $PostDescription;
			$PCDescInsertQuery = "insert into post_content values ($postContentCount, $post_Count, '$PostDescription', 0, 'text')";
			runQuery($PCDescInsertQuery,0);
			//echo $PCDescInsertQuery;
		}
		$activityCountQuery="select max(act_id) as maxActId from activity";
		$resultActivityQuery=runQuery($activityCountQuery,1);
		while($row = mysql_fetch_array($resultActivityQuery))
		{
			$activityCount = $row['maxActId'];
		}
		$activityCount++;

		$catIdQuery="select IC.ic_id as ICId from interest_category IC where IC.name = '$boardID'";
		$resultCatIdQuery=runQuery($catIdQuery,1);
		while($row = mysql_fetch_array($resultCatIdQuery))
		{
			$icid = $row['ICId'];
		}
		//echo $icid;
		//echo $activityCount;
		$activityInsertQuery = "insert into activity values ($activityCount, '$location', $lat, $lng, $icid, 0 )";
		//echo $activityInsertQuery;
		runQuery($activityInsertQuery,0);

		$PFAInsertQuery = "insert into post_for_activity values ($activityCount, $post_Count)";
		//echo $PFAInsertQuery;
		runQuery($PFAInsertQuery,0);
		/*if( !($lat == 999 && $lng == 999))
		{

		}
		else
		{
			//echo "hello12 + '$lat'  '$lng'";
		}*/
		
		//echo $post_Insert_Query;

?>
