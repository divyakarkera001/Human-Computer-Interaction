<!DOCTYPE HTML>
<html>
<head>
<title>Pin-UP</title>
<link rel="stylesheet" type="text/css" href="css/common.css"></link>
<link rel="icon" type="image/x-icon" href="img/favicon.ico"/>
<script src="js/jquery.js"></script>
</head>
<body>
	<div class="header clearfix" style="text-align:center">
		<div class="headerLft">
		<a class="logoLink"  href="home.php" style="float:none;background:none;">
			<span style="float:none;">Pin-up</span>
		</a>
		</div>
	</div>
	<div class="contents">
		<div>
			<form action="saveprofile.php" method="post" class="loginForm">
				<h1>Sign up with Email</h1>
				<ul>
					<!--li class="firstName">
						<input class="name first" name="first_name" id="userFirstName" required placeholder="First Name" value="" autofocus="" type="text">
        			</li>
					<li class="lastName">					
						<input class="name last" name="last_name" id="userLastName" required placeholder="Last Name" value="" type="text">
            		</li-->
					<li class="emailFeild">
						<input name="email" class="username" id="email" type="email" required placeholder="Email Address"/>
					</li>
					<li class="psd">					
						<input name="userpassword" required class="userpassword" id="userUserPassword" placeholder="Password" value="" type="password">
            		</li>
				</ul>
				<div class="clearfix"></div>
				
				<div class="formButtons createButton">
					<input type="submit" name ="Click" value="Sign Up">
					<button id="close" type="reset" onclick="javascript:window.location.href = 'login.html';">Cancel</button>
				</div>
<!--	<ul>
	
		<li>
			<h3><label for="userUserName">User Email (User Name)</label></h3>
			<div>
				
			</div>
		</li>
		
		<li>
			<h3><label for="userPassword">Password</label></h3>
			<div>
				<input name="userpassword1" class="userpassword" id="userUserPassword1" type="password">
			</div>
		</li>
		
		<li>
			<div>
				<h3><label for="userFirstName">First Name</label></h3>
				<input class="name first" name="first_name1" id="userFirstName1" type="text">
				
				<h3><label for="userFirstName">Last Name</label></h3>
				<input class="name last" name="last_name" id="userLastName" type="text">
			</div>
		</li>
		

		<li>
			<h3><label for="userAbout">About You</label></h3>
			<div>
			<textarea name="about" id="userAbout"></textarea>
			</div>
		</li>
		
		<li>
			<h3><label for="userLocation">Location</label></h3>
			<div>
			<input name="location" id="userLocation" value="" type="text">
			</div>
		</li>
		
		<li>
		<h3><label for="userWebsite">Website</label></h3>
		<input name="website_url" class="website" id="userWebsite" value="" type="url">
		</li>
		
		<li>
            <h3><label>Language</label></h3>
            <div>
                <select class="ui-Select Module" name="locale">
    
						<option value="da-DK">
						Dansk 
							</option>
						<option value="de">
						Deutsch 
							</option>
						<option value="en-GB">
						English (UK) 
							</option>
						<option value="en-US" selected="selected">
						English (US) 
							</option>
						<option value="es-419">
						Espanol (America) 
							</option>
						<option value="es-ES">
						Espanol (España) 
							</option>
						<option value="fr">
						Français 
							</option>
						<option value="it">
						Italiano 
							</option>
						<option value="nl">
						Nederlands 
							</option>
						<option value="nb-NO">
						Norsk bokmål 
							</option>
						<option value="pt-BR">
						Português (Brasil) 
							</option>
						<option value="pt-PT">
						Português (Europeu) 
							</option>
						<option value="sv-SE">
						Svenska 
							</option>
						<option value="sk-SK">
						slovenčina 
							</option>
						<option value="fi-FI">
						suomi 
							</option>
						<option value="cs-CZ">
						Čeština 
							</option>
						<option value="ja">
						日本語 
					</option>
				</select>
            </div>
        </li>
        <li>
            <h3><label>Country</label></h3>
            <div>
                
            </div>
        </li>
		
		<li>
			<h3>Gender</h3>
		
			<li>    <label>
			<input name="gender" value="male" type="radio">
			<span class="gender">Male</span>
			</label>
			</li>
			
			<li>    <label>
			<input name="gender" checked="checked" value="female" type="radio">
			<span class="gender">Female</span>
			</label>
			</li>
			
			<li>    <label>
			<input name="gender" value="unspecified" type="radio">
			<span class="gender">Unspecified</span>
			</label>
			</li>
		</li>
	</ul>-->

</form>
		
		</div>
	</div>
	

</body>



