<?php include("header.php"); ?> 
<?php


if(!empty( $_POST['question'] ))
{
	foreach($_POST['question'] as $friendID => $ansID) {
			echo $friendID, ' ';   
			echo  $ansID, ' ';
			
			//Get UserID 
			$userEmail = getUserID();
			$userIDQuery = "select u_id from user where email = '$userEmail';";
			$res = runQuery($userIDQuery,1);
			$userID = mysql_result($res, 0);
			
			$reqFriendID = $friendID;
			$status = $ansID;
			
			//$insertFriendReq_Query = "UPDATE friendRequest SET status = '$status' where senderid = '$reqFriendID' and receiverid = '$userID';";
			$deletePendingReqQuery = "delete from pending_req where req_from = '$reqFriendID' and req_to = '$userID'";
			//echo $deletePendingReqQuery;
			runQuery($deletePendingReqQuery,0);
			if( $status == 'ACCEPTED' )
			{


				$insertFriendsQuery1 = "insert into friends values('$userID','$reqFriendID')";
				runQuery($insertFriendsQuery1,0);

				$insertFriendsQuery2 = "insert into friends values('$reqFriendID','$userID')";
				runQuery($insertFriendsQuery2,0);
			}
	}
}
else
{
	echo 'No Pending Requests';
}
echo '<button onClick="window.location.href=\'home.php\'">Go Back</button>';

?>
<?php include 'footer.php';?>