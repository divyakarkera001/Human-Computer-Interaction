<!DOCTYPE HTML>
<html>
<head>
<title>WildBook</title>
<link rel="stylesheet" type="text/css" href="css/common.css"></link>
<link rel="icon" type="image/x-icon" href="img/favicon.ico"/>
<script src="js/jquery.js"></script>
<script src="//maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
	$(document).ready(function(){
			$('#categorySort').change(function() 
			{
				//alert($('#categorySort').val());
				var selIndx=$("#categorySort").get(0).selectedIndex;
				var selValue=$('#categorySort').val();
				if(selValue != "Search Category")
				{
					//alert(selIndx);
					$.ajax({url:"categorySort.php",
						type: 'get',
						data: { 'para': selValue},
						success:function(result)
						{
							//alert("haha");
							$(".pinitems").html("");
							$(".pinitems").append(result);
						}
					});
				}
				
			
		});
		
		$('#customSearch').click(function(){
			var search=$('#searchId').val();
			

			if(search!="")
			{
					$.ajax({url:"CustomSort.php",
					type: 'get',
					data: { 'para': search,'type':'friends'},
						success:function(result){

						$(".pinitems").html("");
						$(".pinitems").append(result);
						}
					});
			}
		
		});
		$('#customSearchPost').click(function(){
			var search=$('#searchIdPost').val();
			

			if(search!="")
			{
					$.ajax({url:"CustomSort.php",
					type: 'get',
					data: { 'para': search,'type':'post'},
						success:function(result){

						$(".pinitems").html("");
						$(".pinitems").append(result);
						}
					});
			}
		
		});
		
	});
</script>
</head>
<body>
<?php
include 'pinterestSession.php';
include("pinterestDB.php");
if(isLoggedIn()!=1) //Not Signed In
{
	header('Location: login.html');
}
?>
<div class="header clearfix">
	<div class="headerLft lft">
	<a class="logoLink"  href="home.php">
		<span>WildBook</span>
	</a>
	<div class="SearchPanel lft">
		<span>Search : </span>
		<div class="styled-select lft">
			<select id="categorySort">
				<option><span style="color:#ccc !important">Search Category</span></option>
				<?php
					$query="select IC.Name as ICCategories from interest_category IC;";
					
					$result=runQuery($query,1);
					while($row = mysql_fetch_array($result))
					{  
						echo "<option>$row[ICCategories]</option>";    
					}
				?>
			</select>
		</div>
		<div class="searchBar lft">
			<input type="text" value="" id="searchIdPost"  placeholder="Search for Posts..."/>
			<button type="submit" class="searchbutton" id="customSearchPost"></button>
		</div>
		<div class="searchBar lft">
			<input type="text" value="" id="searchId"  placeholder="Search for Friends..."/>
			<button type="submit" class="searchbutton" id="customSearch"></button>
		</div>
		
		<div class="mapSearch lft">
			<a href="mapLocations.php"><img src="img/image_crops/globe.jpg" width="52px" height="40px" align="middle" class="lft"/></a>
		</div>

		
		
	
	</div>
	</div>
	<div class="headerRgt rgt">
		<div class="profilePic lft">
			<a href="profile.php"><img src="img/pin6.jpg" width="52px" height="52px" align="middle" class="lft"/></a>
			<div class="actionItem">
				<img  src="img/image_crops/arrow.png" width="10px" height="8px" align="middle" />
				<div class="dropdownContain">
						<div class="dropOut">
							<div class="triangle"></div>
							<ul>
								<li><a href="editProfile.php">Edit Profile</a></li>
								<!--li><a href="createBoard.php">Post New Entries</a></li-->
								<li><a href="MyPinnedOn.php">My Posts</a></li>
								
								<li><a href="logout.php">Sign Out</a></li>
							</ul>
						</div>
					
				</div>
			</div>
		</div>
		<ul>
			<li><a href="friendRequest.php"><img src="img/image_crops/friends.png" width="22px" height="22px" align="middle"/></a></li>
			<li><a href="friendReqNotification.php" style="color:#fff"><img src="img/image_crops/notification.png" width="22px" height="22px" align="middle"/>
<?php

//Get UserID 
/*$userEmail = getUserID();
$userIDQuery = "select uid from user where email = '$userEmail';";
$res = runQuery($userIDQuery,1);
$userID = mysql_result($res, 0);
		
//Get Notification		
$reqNotificationQuery = "select senderid from friendRequest where receiverid = '$userID' and status='SENT';";
$result = runQuery($reqNotificationQuery,1);
if (!mysql_num_rows($result) <= 0)
{
	//$reqSenderID = mysql_result($result, 0);
	//echo $reqFriendID;
	$numRequest = mysql_num_rows($result);
	echo '('.$numRequest.')' ;
}
*/
?>
</a></li>
			<li><a href="editProfile.php"><img src="img/image_crops/settings.png" width="22px" height="22px" align="middle"/></a></li>
		</ul>
	</div>

</div>
<div class="clearfix"></div>
<!-- Start of page container-->
<div id="pageContainer">

