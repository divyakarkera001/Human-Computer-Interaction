<?php include_once "header.php"; ?>
<div class="pageTitle">Create Schedule </div>
	<div class="margTop20">
		<div class="whiteWrapper"> 
			<div class="pad10">	
				<form id="reminderForm">
				<div class="row">
					<div class="col30 lft"><span class="subTitle">Receive Notification Before </span></div>
					<div class="col70 lft">
						<select id="notiB4">
							<option>5 mins</option>
							<option>10 mins</option>
							<option>15 mins</option>
							<option>20 mins</option>
							<option>30 mins</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col30 lft"><span class="subTitle">Repeat Notification</span></div>
					<div class="col70 lft">
						<select id="notiRep">
							<option>5 mins</option>
							<option>10 mins</option>
							<option>15 mins</option>
							<option>20 mins</option>
							<option>30 mins</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col30 lft"><span class="subTitle">Notification through</span></div>
					<div class="col70 lft">
						<input id="mobile" class="chkbox" type="checkbox" name="remember" value="mobile" /> Mobile <input class="chkbox" id="email" type="checkbox" name="remember" value="Email" /> Email
					</div>
				</div>
				<div class="margTop20">
					<input type="button" value="Reset" class="btnyellow" id="Reset"/>
					<input type="button" value="Save" class="btnyellow" id="save"/>
				</div>
				</form>
			</div>
		</div>
	</div>

</div>







<script>
$(".menu>li").eq(2).addClass("menuSelected");
$(".menuSelected .selected").show();
$(".menuSelected .normal").hide();
$("#Reset").click(function(){
	reminderForm
	$('.chkbox').attr('checked', false);
	$('#notiB4').val("");
	$('#notiRep').val("");
});
$("#save").click(function(){
	if(confirm("Are you sure you save this reminder setting")){
	$('.chkbox').attr('checked', false);
	$('#notiB4').val("");
	$('#notiRep').val("");
	alert("New Reminder saved successfully");
	}
});
</script>
<?php include_once("footer.php"); ?>