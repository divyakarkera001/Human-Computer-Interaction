<?php include("header.php"); ?> 

	<?php
	
	if(isLoggedIn()!=1) //Not Signed In
	{
		header('Location: login.html');
	}
	?>
	
	<?php
		$reqFriendMailID = $_GET['requestedid'];
		$greetingMessage = $_GET['greetingMessage'];
		$userEmail = getUserID();
		$status = "SENT";
		$today = date("Y-m-d");

		//Get UserID 
		$userIDQuery = "select u_id from user where email = '$userEmail';";
		$res = runQuery($userIDQuery,1);
		$userID = mysql_result($res, 0);
		//echo $userID;
		
		if(trim($reqFriendMailID)=='' || trim($greetingMessage)=='' )
		{
			echo "Please provide complete details.";
			echo '<button onClick="window.location.href=\'friendRequest.php\'">Go Back</button>';
		}
		
		else
		{		
			//Get Requested Friends ID
			$reqFriendIDQuery = "select u_id from user where email = '$reqFriendMailID';";
			$result = runQuery($reqFriendIDQuery,1);
			if (mysql_num_rows($result) <= 0)
			{
				echo "That record does not exist.";
				echo '<button onClick="window.location.href=\'friendRequest.php\'">Go Back</button>';
			}
			else			
			{
				$reqFriendID = mysql_result($result, 0);
				$checkExistingFriendQuery = "select u1_id as countFrnds from friends where u1_id = '$userID' and u2_id = '$reqFriendID'";
				$resultCheckExistingFriend = runQuery($checkExistingFriendQuery,1);
				if (mysql_num_rows($resultCheckExistingFriend) > 0)
				{
					echo mysql_num_rows($resultCheckExistingFriend). " " . $userID . " " .$reqFriendID;
					echo "<div style='font-size:15px;font-face:pinupFont;text-align:center;margin:50px'>";
					echo "Friend Alredy Exists";
					echo '<button onClick="window.location.href=\'home.php\'">Go Back</button>';
					//echo '<button onClick="window.location.href=\'friendRequest.php\'">Go Back</button>';
					echo "</div>";
				}
				else
				{
					$insertPendingReqQuery = "INSERT INTO pending_req values ('$userID','$reqFriendID','$today')";
					//echo $insertPendingReqQuery;
					runQuery($insertPendingReqQuery,0);
					echo "<div style='font-size:15px;font-face:pinupFont;text-align:center;margin:50px'>";
					echo "Friend Request Sent!!....";

					echo '<button onClick="window.location.href=\'home.php\'">Go Back</button>';
					echo "</div>";
				}
				//echo $reqFriendID;
			}
		}
	?>
	
	
<?php include 'footer.php';?>
	