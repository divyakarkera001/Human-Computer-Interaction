<?php

?>
<!DOCTYPE>
<html>
	<head>
		<title>Chronous</title>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<link rel="icon" type="image/ico-x" href="images/hourGlass.ico"/>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<!--<script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
		<meta charset='utf-8' />
		<link href='fullcalendar/fullcalendar.css' rel='stylesheet' />
		<link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
		<link rel="stylesheet" type="text/css" href="css/style.css"></link>
		<script src='fullcalendar/lib/moment.min.js'></script>
		<script src='fullcalendar/lib/jquery.min.js'></script>
		<script src='fullcalendar/fullcalendar.min.js'></script>
		<style>
			.rgt {loat: right;}
			.headerRgt, .headerLft {width: auto;}
			.profilePic {padding: 4px 10px;}
			.headerRgt ul { float: left;list-style-type: none;margin: 0;padding: 10px 0 10px 10px;}
			.headerRgt ul li {float: left;padding: 10px;}
			
.actionItem { cursor: pointer;float: right;margin-left: 10px;padding-bottom: 23px;padding-top: 16px;}
.dropdownContain {
    background: none repeat scroll 0 0 #fff;
    border-radius: 3px;
    box-shadow: 2px 2px 2px #aabb9b;
    margin-left: -80px;
    position: absolute;
    top: -400px;
    width: 160px;
    z-index: 5;
}
.dropOut .triangle {
    border-bottom: 8px solid white;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    height: 0;
    left: 50%;
    margin-left: -8px;
    position: absolute;
    top: -8px;
    width: 0;
}
.dropOut ul {
    float: left;
    padding: 10px 0;
}
.dropOut ul li {
    border-radius: 4px;
    color: #777;
    float: left;
    margin: 0 10px;
    padding: 12px 0 10px 15px;
    text-align: left;
    transition: background 0.1s ease-out 0s;
    width: 125px;
}
.actionItem:hover .dropdownContain {
    top: 48px;
}
		</style>
	</head>

	
<body>
	<div class="pageWrapper">
		<div class="header">
			<a href="home.php"><span>Chronous </span></a>
			<div class="headerRgt rgt">
		<a style="float:left;padding-right:10px;cursor:pointer" href="motivational.php"><img src="images/motivate.png" height="30px" width="30px" />	</a>
		<div class="profilePic lft">
			<a href="profile.php"><img src="images/default_user.png" class="lft" align="middle" height="30px" width="30px"></a>
			<div class="actionItem">
				<img src="images/arrow.png" align="middle" height="8px" width="10px">
				<div class="dropdownContain">
						<div class="dropOut">
							<div class="triangle"></div>
							<ul>
								<li><a href="editProfile.php">Edit Profile</a></li>
								<li><a href="MyPinnedOn.php">Help</a></li>								
								<li><a href="logout.php">Sign Out</a></li>
							</ul>
						</div>					
				</div>
			</div>
		</div>
		</div>
		</div>
		
			
		<div class="band"></div>
		<div class='contentWapper'>
			<div class="panelLeft">
				<img class="collapse" src="images/collapse.png"/>
				<img class="uncollapse" src="images/uncollapse.png" style="display:none"/>
				<ul class="menu">
					<li><a href="home.php"><img class="normal" src="images/dashboard_normal.png"/><img class="selected" src="images/dashboard_selected.png"/><span class="liTxt">Dashboard</span></a></li>
					<li><a href="schedule.php"><img class="normal" src="images/calendar_normal.png"/><img class="selected" src="images/calendar_selected.png"/><span class="liTxt">Schedule</span></a>
						<ul class="subMenu" style="display:none">
							<li><a href="createSchedule.php"><span>Add Courses</a></span></li>
							<li><a href="editSchedule.php"><span>Edit Courses</span></a></li>
							<li><a href="viewCourses.php"><span>View Courses</span></a></li>
							<li><a href="reschedule.php"><span>Reschedule</span></a></li>
						</ul
					</li>
					<li><a href="reminder.php"><img class="normal" src="images/alert_normal.png"/><img src="images/alert_selected.png" class="selected"/><span class="liTxt">Reminder Settings</span></a></li>
					<li><a href="performance.php"><img class="normal" src="images/graph_normal.png"/><img class="selected" src="images/graph_selected.png"/><span class="liTxt">Performance Task</span></a></li>					
				</ul>
				
			 </div>
            <div class="panelRight">