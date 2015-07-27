<?php include_once "header.php"; ?>
<div class="pageTitle">Reschedule Study Time </div>
<div class="margTop20">
	<div class="whiteWrapper"> 
		<div class="pad10">
			<div class="row">
				<div class="col20 lft"><span class="subTitle">Subject</span></div>
				<div class="col80 lft">HCI</div>
			</div>
			<div class="row">
				<div class="col20 lft"> <span class="subTitle">Schedule</span></div>
				<div class="col80 lft">
					<div class="inline padRgt20"><span  class="greyTxt">Day :</span>	<span> Monday</span></div>
					<div class="inline"><span  class="greyTxt">Time :</span><span class="from"> 9:00 am</span><span class="to"> 10:00 am</span></div>
				</div>
			</div>
			<div class="row">
				<div class="col20 lft"><span class="subTitle">Reschedule</span></div>
				<div class="col80 lft">
					<div class="inline padRgt20">
						<span class="greyTxt">Day :</span>	
						<select>
							<option>Monday</option>
							<option>Tuesday</option>
							<option>Wednesday</option>
							<option>Thursday</option>
							<option>Friday</option>
							<option>Saturday</option>
							<option>Sunday</option>
						</select>
					</div>
					<div class="inline">
						<span  class="greyTxt">Time :</span>
						<span class="from">
							<input type="text" width="30px"/>
							<select>
								<option>AM</option>
								<option>PM</option>
							</select>
						</span>
						<span class="to">
							<input type="text" width="30px"/>
							<select>
								<option>AM</option>
								<option>PM</option>
							</select>
							
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="margTop20">
			<input type="button" value="Save" class="btnyellow"/>
			<input type="button" value="Cancel" class="btnyellow"/>
		</div>
		</div>
	</div>
</div>
<script>
	$(".subMenu").show();
$(".menu li").eq(1).addClass("menuSelected");
$(".subMenu li").eq(3).css("text-decoration","underline");
</script>
<?php include_once("footer.php"); ?>