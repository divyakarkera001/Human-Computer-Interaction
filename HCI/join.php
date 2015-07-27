<!DOCTYPE HTML>
<html>
<head>
		<title>Chronous</title>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link rel="icon" type="image/ico-x" href="images/hourGlass.ico"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"></link>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<style>
		ul{list-style-type:none}
		ul li{padding :10px}
		input[type="password"],input[type="email"],input[type="text"] {
    background: none repeat scroll 0 0 #f5f5f5;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2) inset;
    height: 40px;
    margin: 10px 0 10px 20px;
    padding: 5px;
    width: 350px;
}
		
		</style>
</head>
<body>
	<div class="Container">
		<div class="header">
			<span>Chronous </span>
		</div>
	<div class="contents" style="padding:20px">
	<div class="whiteWrapper"style="padding:20px"> 
		<div>
			<form action="saveprofile.php" method="post" class="loginForm">
				<h1>Sign up with Email</h1>
				<ul>
					<li class="firstName">
						<input class="name first" name="first_name" id="userFirstName" required placeholder="First Name" value="" autofocus="" type="text">
        			</li>
					<li class="lastName">					
						<input class="name last" name="last_name" id="userLastName" required placeholder="Last Name" value="" type="text">
            		</li>
					<li class="emailFeild">
						<input name="username" class="username" id="userUserName" type="email" required placeholder="EmailAddress"/>
					</li>
					<li class="psd">					
						<input name="userpassword" required class="userpassword" id="userUserPassword" placeholder="Password" value="" type="password">
            		</li>
					<li class="psd">					
						<input name="mobile" required class="userpassword" id="userUserPassword" placeholder="9867154928" value="" type="txt">
            		</li>
					<li>
						<select class="countrySelect" name="country" >    
					<option value="">
					Please select a country 
						</option>
					<option value="AF">
					Afghanistan 
						</option>
					<option value="AX">
					Aland Islands 
						</option>
					<option value="AL">
					Albania (Shqipëria) 
						</option>
					<option value="DZ">
					Algeria 
						</option>
					<option value="AS">
					American Samoa 
						</option>
					<option value="AD">
					Andorra 
						</option>
					<option value="AO">
					Angola 
						</option>
					<option value="AI">
					Anguilla 
						</option>
					<option value="AQ">
					Antarctica 
						</option>
					<option value="AG">
					Antigua and Barbuda 
						</option>
					<option value="AR">
					Argentina 
						</option>
					<option value="AM">
					Armenia
						</option>
					<option value="AW">
					Aruba 
						</option>
					<option value="AU">
					Australia 
						</option>
					<option value="AT">
					Austria
						</option>
					<option value="AZ">
					Azerbaijan (Azərbaycan) 
						</option>
					<option value="BS">
					Bahamas 
						</option>
					<option value="BH">
					Bahrain (البحرين‎) 
						</option>
					<option value="BD">
					Bangladesh (বাংলাদেশ) 
						</option>
					<option value="BB">
					Barbados 
						</option>
					<option value="BY">
					Belarus (Беларусь) 
						</option>
					<option value="BE">
					Belgium (België) 
						</option>
					<option value="BZ">
					Belize 
						</option>
					<option value="BJ">
					Benin (Bénin) 
						</option>
					<option value="BM">
					Bermuda 
						</option>
					<option value="BT">
					Bhutan (འབྲུག) 
						</option>
					<option value="BO">
					Bolivia,Plurinational State of 
						</option>
					<option value="BQ">
					Bonaire,Sint Eustatius and Saba 
						</option>
					<option value="BA">
					Bosnia and Herzegovina (Босна и Херцеговина) 
						</option>
					<option value="BW">
					Botswana 
						</option>
					<option value="BV">
					Bouvet Island 
						</option>
					<option value="BR">
					Brazil (Brasil) 
						</option>
					<option value="IO">
					British Indian Ocean Territory 
						</option>
					<option value="BN">
					Brunei Darussalam 
						</option>
					<option value="BG">
					Bulgaria (България) 
						</option>
					<option value="BF">
					Burkina Faso 
						</option>
					<option value="BI">
					Burundi (Uburundi) 
						</option>
					<option value="KH">
					Cambodia (កម្ពុជា) 
						</option>
					<option value="CM">
					Cameroon (Cameroun) 
						</option>
					<option value="CA">
					Canada 
						</option>
					<option value="CV">
					Cape Verde (Kabu Verdi) 
						</option>
					<option value="KY">
					Cayman Islands 
						</option>
					<option value="CF">
					Central African Republic (République centrafricaine) 
						</option>
					<option value="TD">
					Chad (Tchad) 
						</option>
					<option value="CL">
					Chile 
						</option>
					<option value="CN">
					China (中国) 
						</option>
					<option value="CX">
					Christmas Island 
						</option>
					<option value="CC">
					Cocos (Keeling) Islands 
						</option>
					<option value="CO">
					Colombia 
						</option>
					<option value="KM">
					Comoros (جزر القمر‎) 
						</option>
					<option value="CG">
					Congo (Congo-Brazzaville) 
						</option>
					<option value="CD">
					Congo,the Democratic Republic of the (Jamhuri ya Kidemokrasia ya Kongo) 
						</option>
					<option value="CK">
					Cook Islands 
						</option>
					<option value="CR">
					Costa Rica 
						</option>
					<option value="CI">
					Cote d'Ivoire 
						</option>
					<option value="HR">
					Croatia (Hrvatska) 
						</option>
					<option value="CU">
					Cuba 
						</option>
					<option value="CW">
					Curacao 
						</option>
					<option value="CY">
					Cyprus 
						</option>
					<option value="CZ">
					Czech Republic 
						</option>
					<option value="DK">
					Denmark (Danmark) 
						</option>
					<option value="DJ">
					Djibouti 
						</option>
					<option value="DM">
					Dominica 
						</option>
					<option value="DO">
					Dominican Republic  
						</option>
					<option value="EC">
					Ecuador 
						</option>
					<option value="EG">
					Egypt (مصر‎) 
						</option>
					<option value="SV">
					El Salvador 
						</option>
					<option value="GQ">
					Equatorial Guinea 
						</option>
					<option value="ER">
					Eritrea 
						</option>
					<option value="EE">
					Estonia 
						</option>
					<option value="ET">
					Ethiopia 
						</option>
					<option value="FK">
					Falkland Islands 
						</option>
					<option value="FO">
					Faroe Islands 
						</option>
					<option value="FJ">
					Fiji 
						</option>
					<option value="FI">
					Finland (Suomi) 
						</option>
					<option value="FR">
					France 
						</option>
					<option value="GF">
					French Guiana 
						</option>
					<option value="PF">
					French Polynesia 
						</option>
					<option value="TF">
					French Southern Territories (Terres australes françaises) 
						</option>
					<option value="GA">
					Gabon 
						</option>
					<option value="GM">
					Gambia 
						</option>
					<option value="GE">
					Georgia (საქართველო) 
						</option>
					<option value="DE">
					Germany (Deutschland) 
						</option>
					<option value="GH">
					Ghana (Gaana) 
						</option>
					<option value="GI">
					Gibraltar 
						</option>
					<option value="GR">
					Greece (Ελλάδα) 
						</option>
					<option value="GL">
					Greenland (Kalaallit Nunaat) 
						</option>
					<option value="GD">
					Grenada 
						</option>
					<option value="GP">
					Guadeloupe 
						</option>
					<option value="GU">
					Guam 
						</option>
					<option value="GT">
					Guatemala 
						</option>
					<option value="GG">
					Guernsey 
						</option>
					<option value="GN">
					Guinea (Guinée) 
						</option>
					<option value="GW">
					Guinea-Bissau (Guiné Bissau) 
						</option>
					<option value="GY">
					Guyana 
						</option>
					<option value="HT">
					Haiti 
						</option>
					<option value="HM">
					Heard Island and McDonald Islands 
						</option>
					<option value="VA">
					Holy See (Vatican City State) (Città del Vaticano) 
						</option>
					<option value="HN">
					Honduras 
						</option>
					<option value="HK">
					Hong Kong  
						</option>
					<option value="HU">
					Hungary (Magyarország) 
						</option>
					<option value="IS">
					Iceland 
						</option>
					<option value="IN" selected="selected">
					India 
						</option>
					<option value="ID">
					Indonesia 
						</option>
					<option value="IR">
					Iran,Islamic Republic of 
						</option>
					<option value="IQ">
					Iraq 
						</option>
					<option value="IE">
					Ireland 
						</option>
					<option value="IM">
					Isle of Man 
						</option>
					<option value="IL">
					Israel  
						</option>
					<option value="IT">
					Italy (Italia) 
						</option>
					<option value="JM">
					Jamaica 
						</option>
					<option value="JP">
					Japan  
						</option>
					<option value="JE">
					Jersey 
						</option>
					<option value="JO">
					Jordan
						</option>
					<option value="KZ">
					Kazakhstan 
						</option>
					<option value="KE">
					Kenya 
						</option>
					<option value="KI">
					Kiribati 
						</option>
					<option value="KP">
					Korea,Democratic People's Republic of 
						</option>
					<option value="KR">
					Korea,Republic of
						</option>
					<option value="KW">
					Kuwait  
						</option>
					<option value="KG">
					Kyrgyzstan 
						</option>
					<option value="LA">
					Lao People's Democratic Republic 
						</option>
					<option value="LV">
					Latvia (Latvija) 
						</option>
					<option value="LB">
					Lebanon 
						</option>
					<option value="LS">
					Lesotho 
						</option>
					<option value="LR">
					Liberia 
						</option>
					<option value="LY">
					Libya
						</option>
					<option value="LI">
					Liechtenstein 
						</option>
					<option value="LT">
					Lithuania 
						</option>
					<option value="LU">
					Luxembourg 
						</option>
					<option value="MO">
					Macao 
						</option>
					<option value="MK">
					Macedonia,the former Yugoslav Republic of (Македонија) 
						</option>
					<option value="MG">
					Madagascar 
						</option>
					<option value="MW">
					Malawi 
						</option>
					<option value="MY">
					Malaysia 
						</option>
					<option value="MV">
					Maldives 
						</option>
					<option value="ML">
					Mali 
						</option>
					<option value="MT">
					Malta 
						</option>
					<option value="MH">
					Marshall Islands 
						</option>
					<option value="MQ">
					Martinique 
						</option>
					<option value="MR">
					Mauritania (موريتانيا‎) 
						</option>
					<option value="MU">
					Mauritius (Moris) 
						</option>
					<option value="YT">
					Mayotte 
						</option>
					<option value="MX">
					Mexico (México) 
						</option>
					<option value="FM">
					Micronesia,Federated States of 
						</option>
					<option value="MD">
					Moldova,Republic of (Republica Moldova) 
						</option>
					<option value="MC">
					Monaco 
						</option>
					<option value="MN">
					Mongolia 
						</option>
					<option value="ME">
					Montenegro (Crna Gora) 
						</option>
					<option value="MS">
					Montserrat 
						</option>
					<option value="MA">
					Morocco 
						</option>
					<option value="MZ">
					Mozambique 
						</option>
					<option value="MM">
					Myanmar
						</option>
					<option value="NA">
					Namibia 
						</option>
					<option value="NR">
					Nauru 
						</option>
					<option value="NP">
					Nepal 
						</option>
					<option value="NL">
					Netherlands  
						</option>
					<option value="NC">
					New Caledonia  
						</option>
					<option value="NZ">
					New Zealand 
						</option>
					<option value="NI">
					Nicaragua 
						</option>
					<option value="NE">
					Niger 
						</option>
					<option value="NG">
					Nigeria 
						</option>
					<option value="NU">
					Niue 
						</option>
					<option value="NF">
					Norfolk Island 
						</option>
					<option value="MP">
					Northern Mariana Islands 
						</option>
					<option value="NO">
					Norway (Norge) 
						</option>
					<option value="OM">
					Oman 
						</option>
					<option value="PK">
					Pakistan 
						</option>
					<option value="PW">
					Palau 
						</option>
					<option value="PS">
					Palestine,State of 
						</option>
					<option value="PA">
					Panama 
						</option>
					<option value="PG">
					Papua New Guinea 
						</option>
					<option value="PY">
					Paraguay 
						</option>
					<option value="PE">
					Peru 
						</option>
					<option value="PH">
					Philippines 
						</option>
					<option value="PN">
					Pitcairn 
						</option>
					<option value="PL">
					Poland (Polska) 
						</option>
					<option value="PT">
					Portugal 
						</option>
					<option value="PR">
					Puerto Rico 
						</option>
					<option value="QA">
					Qatar  
						</option>
					<option value="RE">
					Reunion 
						</option>
					<option value="RO">
					Romania  
						</option>
					<option value="RU">
					Russian Federation  
						</option>
					<option value="RW">
					Rwanda 
						</option>
					<option value="BL">
					Saint Barth 
						</option>
					<option value="SH">
					Saint Helena,Ascension and Tristan da Cunha 
						</option>
					<option value="KN">
					Saint Kitts and Nevis 
						</option>
					<option value="LC">
					Saint Lucia 
						</option>
					<option value="MF">
					Saint Martin  
						</option>
					<option value="PM">
					Saint Pierre and Miquelon 
						</option>
					<option value="VC">
					Saint Vincent and the Grenadines 
						</option>
					<option value="WS">
					Samoa 
						</option>
					<option value="SM">
					San Marino 
						</option>
					<option value="ST">
					Sao Tome and Principe 
						</option>
					<option value="SA">
					Saudi Arabia 
						</option>
					<option value="SN">
					Senegal  
						</option>
					<option value="RS">
					Serbia 
						</option>
					<option value="SC">
					Seychelles 
						</option>
					<option value="SL">
					Sierra Leone 
						</option>
					<option value="SG">
					Singapore 
						</option>
					<option value="SX">
					Sint Maarten (Dutch part) 
						</option>
					<option value="SK">
					Slovakia (Slovensko) 
						</option>
					<option value="SI">
					Slovenia (Slovenija) 
						</option>
					<option value="SB">
					Solomon Islands 
						</option>
					<option value="SO">
					Somalia (Soomaaliya) 
						</option>
					<option value="ZA">
					South Africa 
						</option>
					<option value="GS">
					South Georgia and the South Sandwich Islands 
						</option>
					<option value="SS">
					South Sudan 
						</option>
					<option value="ES">
					Spain 
						</option>
					<option value="LK">
					Sri Lanka
						</option>
					<option value="SD">
					Sudan 
						</option>
					<option value="SR">
					Suriname 
						</option>
					<option value="SJ">
					Svalbard and Jan Mayen (Svalbard og Jan Mayen) 
						</option>
					<option value="SZ">
					Swaziland 
						</option>
					<option value="SE">
					Sweden (Sverige) 
						</option>
					<option value="CH">
					Switzerland (Schweiz) 
						</option>
					<option value="SY">
					Syrian Arab Republic 
						</option>
					<option value="TW">
					Taiwan 
						</option>
					<option value="TJ">
					Tajikistan 
						</option>
					<option value="TZ">
					Tanzania,United Republic of 
						</option>
					<option value="TH">
					Thailand (ไทย) 
						</option>
					<option value="TL">
					Timor-Leste 
						</option>
					<option value="TG">
					Togo 
						</option>
					<option value="TK">
					Tokelau 
						</option>
					<option value="TO">
					Tonga 
						</option>
					<option value="TT">
					Trinidad and Tobago 
						</option>
					<option value="TN">
					Tunisia
						</option>
					<option value="TR">
					Turkey (Türkiye) 
						</option>
					<option value="TM">
					Turkmenistan 
						</option>
					<option value="TC">
					Turks and Caicos Islands 
						</option>
					<option value="TV">
					Tuvalu 
						</option>
					<option value="UG">
					Uganda 
						</option>
					<option value="UA">
					Ukraine 
						</option>
					<option value="AE">
					United Arab Emirates 
						</option>
					<option value="GB">
					United Kingdom 
						</option>
					<option value="US" selected>
					United States 
						</option>
					<option value="UM">
					United States Minor Outlying Islands 
						</option>
					<option value="UY">
					Uruguay 
						</option>
					<option value="UZ">
					Uzbekistan 
						</option>
					<option value="VU">
					Vanuatu 
						</option>
					<option value="VE">
					Venezuela,Bolivarian Republic of 
						</option>
					<option value="VN">
					Vietnam 
						</option>
					<option value="VG">
					Virgin Islands,British 
						</option>
					<option value="VI">
					Virgin Islands,U.S. 
						</option>
					<option value="WF">
					Wallis and Futuna 
						</option>
					<option value="EH">
					Western Sahara
						</option>
					<option value="YE">
					Yemen
						</option>
					<option value="ZM">
					Zambia 
						</option>
					<option value="ZW">
					Zimbabwe 
						</option>
				</select>
					
					</li>
					<li style="padding:0 20px;">
						<fieldset class="formInlineCheckedSet">
							
							<ul>
								<li>    
									<label>
										<input name="gender" value="female" type="radio" checked="checked">
											<span class="gender">Female</span>
									</label>
								</li>
								<li>    
									<label>
										<input name="gender" value="male" type="radio">
										<span class="gender">Male</span>
									</label>
								</li>
							</ul>
						</fieldset>
    			
					</li>
				
				</ul>
				<div class="clearfix"></div>
				
				<div class="formButtons createButton">					
					<input id="save" type="button" value="Save" class="btnyellow"/>
					<input id="ok" type="button" onclick="javascript:window.location.href = 'login.php';" value="Cancel" class="btnyellow"/>
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
	</div>
	
</div>
</body>



