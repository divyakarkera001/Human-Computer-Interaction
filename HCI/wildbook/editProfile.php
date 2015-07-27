<?php include 'header.php';?>
<div class="contents">
		<div>
<form action="saveEditedProfile.php" method="post" class="loginForm">

<?php


if(isLoggedIn()!=1) //Not Signed In
{
	header('Location: login.html');
}

$useremail = getUserID();


$sqlQuery = "select * from user where email ='$useremail';";
$result = runQuery($sqlQuery, 1);
$myrow = mysql_fetch_assoc($result);

	$user_email = $myrow["email"];
	$password = $myrow["password"];
	$dob = $myrow["dob"];
	$introduction = $myrow["introduction"];
	$address = $myrow["address"];
	$ph_num = $myrow["ph_num"];
	//echo $address;
?>


    <h1>Edit Profile</h1>
	<ul>
	
		<li>
			<h3><label for="userUserName">User Email (User Name)</label></h3>
			<div>
				<input name="username" class="username" id="userUserName" type="text" disable value =<?php echo $user_email;?> disabled="disabled" >
			</div>
		</li>
		
		<li>
			<h3><label for="userPassword">Password</label></h3>
			<div>
				<input name="userpassword" value='<?php echo $password?>' class="userpassword" id="userUserPassword" type="password">
			</div>
		</li>
		
		<li>
			<div>
				<h3><label for="userDOB">Date of Birth</label></h3>
				<input class="name first" name="user_dob" id="userDOB" type="text" value = '<?php echo $dob?>' >
			</div>
		</li>
		

		<li>
			<h3><label for="userAbout">About You</label></h3>
			<div>
			<textarea name="about" id="userAbout" rows="2" cols="50">
				<?php echo $introduction?> 
			</textarea>
			</div>
		</li>
		
		<li>
			<h3><label for="userLocation">Location</label></h3>
			<div>
			<input name="location" id="userLocation" type="text" value =  '<?php echo $address?>'/>
			</div>
		</li>

		<li>
			<h3><label for="userPhNum">Phone Number</label></h3>
			<div>
			<input name="phone_number" id="phoneNumber" type="text" value =  '<?php echo $ph_num?>'/>
			</div>
		</li>

	</ul>

	<div class="formButtons createButton">
		<input type="submit" name ="Click" value="Save Profile"/>
		<button id="close" type="reset" onclick="javascript:window.location.href = 'home.php';">Cancel</button>
	</div>
</form>
</div>
</div>

<?php
include 'footer.php';?>
