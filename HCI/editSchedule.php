<?php include_once "header.php";
	session_start();
	
 ?>
<div class="pageTitle">Edit Schedule </div>
<div class="margTop20">
	<div class="whiteWrapper"> 
		<div class="pad10">
			<div class="row">
				<div class="col20 lft"><span class="subTitle">Subject</span></div>
				<div class="col80 lft">
				<select id="subject">
				<?php
				require_once('dbConnection.php');
				$idUser = $_SESSION['idUser'];
			openDbConnection();
					$sqlStatus = <<<SQL
	select * from  tbl_class where id_user='$idUser';
SQL;

	if(!$result = $db->query($sqlStatus)){
		die('There was an error running the query [' . $db->error . ']');
		
	}
	
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
			echo "<option value='".$row['course_name']."'>".$row['course_name']."</option>";		
		}
	}
	
	
	$result->close();
	
	closeDbConnection();
?>
	</select>				
				
				</div>
			</div>
			<div class="row">
				<div class="col20 lft"> <span class="subTitle">Date</span></div>
				<div class="col80 lft">
					<div class="inline padRgt20"><input name="dateFrm" type="text" class="form-control" id="datepickerFrm" class="datepicker"  size="23"/>	</div>
					<div class="inline"><input name="dateTo" type="text" class="form-control" id="datepickerTo" class="datepicker"  size="23"/>	</div>
				</div>
			</div>
			<div class="dayTime">
				<img src="images/removeIcon.png" class="remove"/>
			<div class="row time">
			
				<div class="col20 lft"> <span class="subTitle">Time</span></div>
				<div class="col80 lft">
					<span class="from">
							<input id="timeFrom" type="text" width="30px"/>
							
						</span>
						<span class="to">
							<input id="timeTo" type="text" width="30px"/>
							
							
						</span>
				</div>
			</div>
		
			<div class="row day">
				<div class="col20 lft"><span class="subTitle">Day</span></div>
				<div class="col80 lft">
					<div class="inline padRgt20">	
						<select id="day">
							<option value='Monday'>Monday</option>
							<option value='Tuesday'>Tuesday</option>
							<option value='Wednesday'>Wednesday</option>
							<option value='Thursday'>Thursday</option>
							<option value='Friday'>Friday</option>
							<option value='Saturday'>Saturday</option>
							<option value='Sunday'>Sunday</option>
						</select>
					</div>
					
				</div>
			</div>
		</div>
	</div>
		<div>
			<ul class="menuItem">
				<li>
					<a href="javascript:void(0)" class="addDay"><img src="images/addIcon.png" style="width: 20px; height: 20px;"/><span>Additional Day</a>
				</li>
			</ul>
		</div>
		<div class="margTop20">
			<input id="save" type="button" value="Save" class="btnyellow"/>
			<input id="delete" type="button" value="Delete Course" class="btnyellow"/>
			<input id="Reset" type="button" value="Reset" class="btnyellow"/>
		</div>
		</div>
	</div>
</div>
<script>
$(".addDay").click(function(){
	$(".pad10").append($(".dayTime").clone(true));
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
$(".subMenu li").eq(1).css("text-decoration","underline");
 $( ".pageWrapper" ).on("focus",'#datepickerFrm,#datepickerTo',function(){
	var dateToday = new Date();
	var dates = $("#datepickerFrm, #datepickerTo").datepicker({
	defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    maxDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "datepickerFrm" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
	});
});
$("#subject").change(function() {
	var course = $(this).val();
	$.ajax({
                type:'POST',
                url:'getCourseDetails.php',
                data:{course:course},
				dataType: 'json',
                success:function(response){					
					$("#datepickerFrm").val(response['datepickerFrm']);
					$("#datepickerTo").val(response['datepickerTo']);
					$("#timeFrom").val(response['timeFrom']);
					$("#timeTo").val(response['timeTo']);
					$("#day").val(response['day']);
				}});
});
$( "#subject" ).trigger( "change" );
$("#save").click(function(){
	$("#datepickerFrm").val("");
	$("#datepickerTo").val("");
	$("#timeFrom").val("");
	$("#timeTo").val("");
	$("#day").val('Monday');
	alert("Data updated Successfully");
});
$("#Reset").click(function(){
	$("#datepickerFrm").val("");
	$("#datepickerTo").val("");
	$("#timeFrom").val("");
	$("#timeTo").val("");
	$("#day").val('Monday');
});
$("#delete").click(function(){
	if(confirm("Are you sure you want to delete this")){
	$("#datepickerFrm").val("");
	$("#datepickerTo").val("");
	$("#timeFrom").val("");
	$("#timeTo").val("");
	$("#day").val('Monday');
	alert("Course deleted Successfully");
	}
	
});
</script>
<?php include_once("footer.php"); ?>