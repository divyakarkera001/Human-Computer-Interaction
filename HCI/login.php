<?php

?>
<!DOCTYPE>
<html>
	<head>
		<title>Chronous</title>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link rel="icon" type="image/ico-x" href="images/hourGlass.ico"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"></link>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	</head>
	
<body>
	<div class="Container">
		<div class="header">
			<span>Chronous </span>
		</div>
		<!--<div class="signUp"> 
			New to <span class="pinupfont"> Wild Book </span>? ?
			<form style="display:inline"><input type="submit" value="Register" onClick="this.form.action='createProfile.php';this.form.submit()"/></form>
		</div>-->
		<div class="loginWrapper">
			<div class="loginSubDivision">
				<div class="msg">
					<div class="">
						Welcome to Chronous !
					</div>
					<div>
						The best way to track your study time 
					</div>
				</div>
			</div>
				<div class="loginSubDivision">
					<div class="loginBox">
						<div style="font-size:20px; font-family: 'Roboto Slab', serif;font-weight: bold; margin-bottom: 10px;">Login</div>
						<div>
							<span style="color:red;display:none" id="error">Invalid Email Id or Password</span>
								<form method="post" action="">
									<input id="email" type="email" name="user" placeholder="yourname@email.com" required><br/>
									<input id ="password" type="password" name="pswd" placeholder="password" required><br/>
									<div>
										<input id="login" type="submit" value="Login" class="btn"/>										
									</div>
									<div class="bottomLinks">
										<div class="remember"><input type="checkbox" name="remember" value="1" <?php if(isset($_COOKIE['remember_me'])) {echo 'checked="checked"';}?>/><span class="lft" style="padding-top:2px">Remember Me</span></div>
										<a href="forgot_password.html" rel="forgot_password" class="blueLink">Forgot your password ?</a>
										<div class="clr"></div>
										<div>
											<a class="signup" href="join.php">Sign up now</a>
										</div>
									</div>
								
								</form>
						</div>
					</div>
				</div>
				<div class="clr"></div>
		</div>
	</div>
	<script>
		$("#login").click(function(e){
			e.preventDefault();
			$.ajax({
					type:'POST',
					url:'loginCheck.php',
					data:{'email':$('#email').val(),'password':$('#password').val()},
					success:function(response){
						if(response==1){
							document.location.href='home.php';					
						}
						else{
							$("#error").show();
						}
					}
				});
			
		});
	</script>
</body>
</html>

