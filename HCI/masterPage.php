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
		<style>

		</style>
	</head>
	
<body>
	<div class="pageWrapper">
		<div class="header">
			<span>Chronous </span>
		</div>
		<div class="band"></div>
		<div class='contentWapper'>
			<div class="panelLeft">
				<img class="collapse" src="images/collapse.png"/>
				<img class="uncollapse" src="images/uncollapse.png" style="display:none"/>
				<ul class="menu">
					<li>Schedule</li>
					<li>Reminder Settings</li>
					<li>Performance Task</li>					
				</ul>
				
			 </div>
            <div class="panelRight">ssssss</div>
			
		</div>
		
	</div>
	<script>
		$(".collapse").click(function(){
			$(".collapse").hide();
			$(".uncollapse").show();
		});
		$(".uncollapse").click(function(){
			$(".uncollapse").hide();
			$(".collapse").show();
		});
		$(".menu li").click(function(){
			$(".menu").find(".menuSelected").removeClass("menuSelected");
			$(this).addClass("menuSelected");
		});
	</script>
</body>
</html>

