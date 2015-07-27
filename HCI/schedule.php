<?php include_once "header.php"; ?>
<div class="pad10">
<div class="margTop20">
	<div class="whiteWrapper"> 
			<div id="calendar" style="height:200px;overflow: hidden;">
			
			</div>
	</div>
	
</div>

<div class="margTop20">
	<div class="whiteWrapper"> 
			<ul class="menuItem">
				<li><a href="createSchedule.php"><img src="images/addIcon.png" style="width: 20px; height: 20px;"/><span>Add Courses</a></span></li>
				<li><a href="editSchedule.php"><img src="images/editIcon.png"/><span>Edit Courses</span></a></li>
				<li><a href="viewCourses.php"><img src="images/view.png"style="width: 20px; height: 20px;" /><span>View Courses</span></a></li>
				<li><a href="reschedule.php"><img src="images/reschedule_normal.png"/><span>Reschedule</span></a></li>				
			</ul>
	</div>
</div>
</div>



<script>

$(".menu>li").eq(1).addClass("menuSelected");
$(".subMenu").show();
$(".menuSelected .selected").show();
$(".menuSelected .normal").hide();
	
$(document).ready(function() {	
var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
	var today = y+"-"+m+"-"+d;
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'basicWeek,basicDay'
			},
			defaultView: 'basicWeek',
			defaultDate: '2014-12-02',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'Java',
					start: '2014-12-02'
				},
				{
					title: 'Java',
					start: '2014-12-09',
					
				},
				{
					id: 999,
					title: 'Java',
					start: '2014-12-16T16:00:00'
				},
				{
					id: 999,
					title: 'Java',
					start: '2014-12-23T16:00:00'
				},
				{
					title: 'Java',
					start: '2014-12-30',
					
				},
				{
					title: 'HCI',
					start: '2014-12-04T10:30:00',
					
				},
				{
					title: 'HCI',
					start: '2014-12-11T12:00:00'
				},
				{
					title: 'HCI',
					start: '2014-12-18T14:30:00'
				}
			]
		});
		
	});
</script>
<?php include_once("footer.php"); ?>