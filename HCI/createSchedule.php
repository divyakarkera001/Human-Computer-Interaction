<?php include_once "header.php";
session_start();
 ?>
<div class="pageTitle">Create Schedule </div>
<div class="margTop20">
<div class="course">
	<div class="whiteWrapper"> 
	<img src="images/removeIcon.png" class="removeCourse"/>
		<div class="pad10">
			<form class="form">
			<div class="row">
				<div class="col20 lft"><span class="subTitle">Subject</span></div>
				<div class="col80 lft">
					<input type="text" width="30px" name="subject"/>
				</div>
			</div>
			<div class="row">
				<div class="col20 lft"> <span class="subTitle">Date</span></div>
				<div class="col80 lft">
					<div class="inline padRgt20"><input name="dateFrm" type="text" class="form-control datepickerFrm datepicker" id="datepickerFrm1" size="23"/> -</div>
					<div class="inline"><input name="dateTo" type="text" id="datepickerTo2" class="datepickerTo datepicker form-control"  size="23"/>	</div>
				</div>
			</div>
			<div class="dayTime">
				<img src="images/removeIcon.png" class="remove"/>
			<div class="row time">
			
				<div class="col20 lft"> <span class="subTitle">Time</span></div>
				<div class="col80 lft">
					<span class="from">
							<input type="text" name = "timeFrm" width="30px"/> - 
							
						</span>
						<span class="to">
							<input type="text" width="30px" name="timeTo"/>	
						</span>
						<span style="font-size:10px;color:#c4c4c4">
								Please enter in 24hrs format
						</span>
				</div>
			</div>
		
			<div class="row day">
				<div class="col20 lft"><span class="subTitle">Day</span></div>
				<div class="col80 lft">
					<div class="inline padRgt20">	
						<select class="daySel">
							<option>Monday</option>
							<option>Tuesday</option>
							<option>Wednesday</option>
							<option>Thursday</option>
							<option>Friday</option>
							<option>Saturday</option>
							<option>Sunday</option>
						</select>
					</div>
					
				</div>
			</div>
		</div>
		</form>
		</div>
			<div>
			<ul class="menuItem">
				<li>
					<a href="javascript:void(0)" class="addDay"><img src="images/addIcon.png" style="width: 20px; height: 20px;"/><span>Additional Day</a>
				</li>
			</ul>
		</div>
	</div>
	
	</div>
		<div class="margTop20">
			<input type="button" value="Additional course" class="btnyellow addCourse"/>
			<input type="button" value="Save" class="btnyellow" id="save"/>
			<input type="button" value="Cancel" class="btnyellow"/>
		</div>
	

</div>
<script>

$(".addCourse").click(function(){
	$(".course").append($(".whiteWrapper").clone(true));
		$(".removeCourse").show();
	
	
});
$(".course").on('click', ".removeCourse",function(){
	$(this).parent().remove();
		if($(".removeCourse").size()== 1){
			$(".removeCourse").hide();
		}
	});
$(".addDay").click(function(){
	$(this).parentsUntil(".course").find(".pad10").append($(".dayTime").clone(true));
	//$(".course").append($(".dayTime").clone(true));
	$(".remove").show();
	
});
$(".pad10").on('click', ".remove",function(){
	$(this).parent().remove();
		if($(".remove").size()== 1){
			$(".remove").hide();
		}
	});
	$(".subMenu").show();
$(".menu li").eq(1).addClass("menuSelected");
$(".subMenu li").eq(0).css("text-decoration","underline");
 $( ".pageWrapper" ).on("focus",'.datepickerFrm,.datepickerTo',function(){
	var dateToday = new Date();
	var dates = $(".datepickerFrm, .datepickerTo").datepicker({
	defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
	dateFormat: 'yy-mm-dd',
    onSelect: function(selectedDate) {
       /* var option = this.id == "datepickerFrm" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);*/
    }
	});
});
$("#save").click(function(){
	var flag = false;
	$("input[type='text']").each(function() {
		if($.trim($(this).val())==""){
			$(this).css('border','1px solid red');
			flag = true;
		}
	});
		if(flag){
			alert("one or more fields left blank");
		}
		else{
			$(".pad10").each(function() {
				var data = $('.form').serialize();
				$.ajax({
					type:'POST',
					url:'insertSchedule.php',
					data:{'formdata':data,'day':$(".daySel").val()},
					success:function(response){
						alert(response);
					}
				});
			});
			
		}
	
});
</script>
<?php include_once("footer.php"); ?>