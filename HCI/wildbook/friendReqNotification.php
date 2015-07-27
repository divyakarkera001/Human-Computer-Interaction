<?php include("header.php"); ?> 

<form method=post action="notificationUpdate.php" >
<?php


//Get UserID 
$userEmail = getUserID();
$userIDQuery = "select u_id from user where email = '$userEmail';";
$res = runQuery($userIDQuery,1);
$userID = mysql_result($res, 0);
		
//Get Notification		
$reqNotificationQuery = "select req_from, requested_on from pending_req where req_to = '$userID';";
$result = runQuery($reqNotificationQuery,1);
if (!mysql_num_rows($result) <= 0)
{
	while ($row = mysql_fetch_array($result)) 
	{
			$senderID = $row['req_from'];
			$senderInfoQuery = "select email from user where u_id = '$senderID';";
			$resultInfoQuery = runQuery($senderInfoQuery,1);
			//$row = mysql_result($resultInfoQuery, 0);
			//echo "Friend Req from ".$row;
			$text = "Friend Request from ";
			echo $text;
			echo '<br/>';
			while ($row1 = mysql_fetch_array($resultInfoQuery)) 
			{
				echo $row1['email'];
				echo " on ";
				echo $row['requested_on'];
			}
				//echo $row['email'];
				echo '  ====>  ';
				echo '<label>Accept</label><input type="radio" name="question['.$senderID.']" value=\'ACCEPTED\' />';
				echo '<label>Ignore </label><input type="radio" name="question['.$senderID.']" value=\'IGNORED\' />'.'<br/>';
			//}
		}
}
?>

	<div class="formButtons">
		<br/>
		<input type="submit" name ="Click" value="Submit">
	</div>
</form>
<?php include 'footer.php';?>