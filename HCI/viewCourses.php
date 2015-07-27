<?php include_once "header.php"; ?>
<div class="pageTitle">View Schedule  </div>
<div class="margTop20">
	<div class="whiteWrapper"> 
	<div class="pad10">
		<table class="courseTbl">
			<thead>
				<th></th>
				<th>Scheduled Hours </th>
				<th>Actual Hours</th>
			</thead>
			<tbody>
				<tr>
					<td>HCI</td>
					<td></td>
					<td></td>
				</tr>
				<tr class="scheduleInfo">
					<td>
						<div class="inline padRgt20"><span  class="greyTxt">Day :</span>	<span> Monday</span></div>
						<div class="inline"><span  class="greyTxt">Time :</span><span class="from"> 9:00 am</span><span class="to"> 10:00 am</span></div>
					</td>
					<td>2</td>
					<td>2</td>
				</tr>
				<tr class="scheduleInfo">
					<td>
						<div class="inline padRgt20"><span  class="greyTxt">Day :</span>	<span> Monday</span></div>
						<div class="inline"><span  class="greyTxt">Time :</span><span class="from"> 9:00 am</span><span class="to"> 10:00 am</span></div>
					</td>
					<td>1</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Java</td>
					<td></td>
					<td></td>
				</tr>
				<tr class="scheduleInfo">
					<td>
						<div class="inline padRgt20"><span  class="greyTxt">Day :</span>	<span> Monday</span></div>
						<div class="inline"><span  class="greyTxt">Time :</span><span class="from"> 9:00 am</span><span class="to"> 10:00 am</span></div>
					</td>
					<td>1</td>
					<td>1</td>
				</tr>
			</tbody>
		
		</table>
		</div>
	</div>

</div>
<script>
	$(".subMenu").show();
$(".menu li").eq(1).addClass("menuSelected");
$(".subMenu li").eq(2).css("text-decoration","underline");
</script>
<?php include_once("footer.php"); ?>