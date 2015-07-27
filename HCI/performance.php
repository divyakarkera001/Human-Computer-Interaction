<?php include_once "header.php"; ?>
<div class="pageTitle">Progress Report </div>
<div class="margTop20">
	<div class="whiteWrapper"> 
		<div class="pad10">
			<div>
				<div class="col30 lft">
					<select id="duration">
						<option value="weekly">Weekly</option>
						<option value="monthly">Monthly</option>
					</select>
				</div>
				<div class="col30 lft">
					<select>
						<option>All</option>
						<option>Java</option>
						<option>HCI</option>
					</select>
				</div>
				<div class="col30 lft">
					<input id="ok" type="button" value="OK" class="btnyellow"/>
				</div>
			</div>
			<div class="clr"></div>
			<div class="margTop20" id="monthly" style="display:none">
			<img src="http://localhost:8181/hci/example.drawBarChart.simple.php" alt="http://localhost:8181/hci/example.drawBarChart.simple.php" class="decoded">
			</div>
			<div class="margTop20" id="weekly">
				<img src="http://localhost:8181/hci/example.drawBarChart.simpleWeekly.php" alt="http://localhost:8181/hci/example.drawBarChart.simpleWeekly.php" class="decoded">
				
			</div>
		</div>
		<div style="color:red; padding:10px">Not bad 90% of the target achieved</div>
	</div>
</div>
<script>
$(".menu>li").eq(3).addClass("menuSelected");
$(".menuSelected .selected").show();
$(".menuSelected .normal").hide();
$("#ok").click(function(){
	if($("#duration").val()=="weekly"){
		$("#weekly").show();
		$("#monthly").hide();
	}else{
		$("#weekly").hide();
		$("#monthly").show();
	}
});
</script>
<?php include_once("footer.php"); ?>