<?php
include 'pinterestDB.php';
	/*echo "<div style='border 5px solid red' id='test'>";
	echo $_GET['On']."\n";
	echo $_GET['action']."\n";
	echo "</div>";*/
	
	/*if($_GET['On']=='follow')
	{
			
		if($_GET['action']=='follow')
		{
			$boardid=$_GET['para2'];
				
			$query= "call insertintostream(".$boardid.",'".$_GET['para1']."')";
			$result=runQuery($query,0);
		}
		else
		{
			$query="delete from stream where uid in(select uid from user where email='".$_GET['para1']."')";
			$result=runQuery($query,0);
		}
		
	}
	if($_GET['On']=='delete')
	{
		$query="call deletepin('".$_GET['para1']."','".$_GET['para2']."')";
		$result=runQuery($query,0);
	}
	
	if($_GET['On']=='pin')
	{
		$query="insert into pinnedon(pinid,boardid) values('".$_GET['para2']."','".$_GET['para1']."')";
		$result=runQuery($query,0);
	}*/

	if($_GET['On']=='like')
	{

			//$query="insert into likes(uid,pinid) values('".$_GET['para1']."','".$_GET['para2']."')";
		if($_GET['para_type']=='pic')
		{
			$query="update post P set likes =".$_GET['para2']." where P.p_id = (select PC.p_id from post_content PC where content = '".$_GET['para1']."');";
		}
		if($_GET['para_type']=='text')
		{
			$query="update post P set likes =".$_GET['para2']." where P.p_id = (select PC.p_id from post_content PC where content = '".$_GET['para_textVal']."');";
		}
			
			echo "1234";	
		$result=runQuery($query,0);
	}
	
	else if($_GET['On']=='comment')
	{
		$maxCIdQuery = "select max(c_id) as MaxCId from comment";
		$resultMaxCId=runQuery($maxCIdQuery,1);
		$MaxCId = 0;
		while($row = mysql_fetch_array($resultMaxCId))
		{
			$MaxCId = $row['MaxCId'];
			//echo $MaxCId;
		}
		$MaxCId++;
		$today = date("Y-m-d");
		$UMail = $_GET['para1'];
		$Comment = $_GET['action'];
		$content = $_GET['postContent'];
		//echo $UMail;
		//echo "   ";
		//echo $Comment;
		//echo "   ";
		//echo $content;

		$uIdQuery = "select u_id as UID from user where email = '$UMail'";
		$resultUId=runQuery($uIdQuery,1);
		while($row = mysql_fetch_array($resultUId))
		{
			$Uid = $row['UID'];
			//echo $Uid;
		}
		$PostContent = $_GET['action'];
		$PIdQuery = "select P.p_id as PId from post P inner join post_content PC on P.p_id = PC.P_id and PC.content = '$content'";
		$resultPId=runQuery($PIdQuery,1);
		while($row = mysql_fetch_array($resultPId))
		{
			$PId = $row['PId'];
			//echo $PId;
		}
		//echo $Uid;
		//echo "   ";
		//echo $PId;
		//echo $_GET['posttype'];

		$contentType = $_GET['posttype'];

		//"select max(c_id) as MaxCId from comment C inner join post P on C.p_id = P.p_id inner join post_content PC on PC.p_id = P.p_id where pc_id=";
		if($contentType == 'pic')
		{
			$commentInsertQuery = "insert into comment values ('$MaxCId', '$PId', '$Uid', '$Comment', '$today')";
			$result=runQuery($commentInsertQuery,0);
			//echo $commentInsertQuery;
			//echo "Hello... World";
		}
		//$query="insert into comments(uid,pinid,usrcomments) values('".$_GET['para1']."','".$_GET['para2']."','".$_GET['action']."')";
				
		//$result=runQuery($query,0);
		$commentReadquery="select C.comment_str as ComStr, U.email as UMail, C.commented_on as ComOn from comment C inner join user U on C.u_id = U.u_id where C.p_id = $PId";
		//echo $commentReadquery;
		$result=runQuery($commentReadquery,1);
		//$row=mysql_fetch_array($result);
			
		while($row = mysql_fetch_array($result))
		{  	
			echo "<div style='border-bottom:1px solid #E3E3E3;padding-left:20px;padding-top:10px;padding-bottom:10px'>";
			echo "<div class='uploaderPic'>";
			echo "<div style='width:90%;margin:0 auto'><img src='img/default_user.png' style='width:100%' align='middle' style='margin:0 auto;'/></div>";
			echo "</div>";
			echo "<div class='uploaderName'><a style='' href=''>";
			echo $row['UMail']." on ".$row['ComOn'];
			echo "</a></div>";
			echo "<div class='imgDescription'>$row[ComStr]";
			echo "</div><div class='clearfix'></div></div> ";		
		}

	}
?>