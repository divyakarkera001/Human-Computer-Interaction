<?php 
include_once "header.php"; 
session_start();
require_once('dbConnection.php');
$idUser = $_SESSION['idUser'];
openDbConnection();
$sqlStatus = <<<SQL
	select * from tbl_status where id_user='$idUser';
SQL;
echo "<div class='pad10'>
		<div class='col50'>
			<div class='whiteWrapper' style='height:400px;overflow:auto'> 
				<table class='infoTbl'>
					<thead>
						<tr>
							<th>Subject </th>
							<th>Date </th>
							<th>Status </th>
						</tr>					
					</thead>
				<tbody>";
	if(!$result = $db->query($sqlStatus)){
		die('There was an error running the query [' . $db->error . ']');
	}
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
			echo "<tr><td>".$row['subject']."</td><td>".$row['dateTime']."</td><td>".$row['status']."</td></tr>";		
		}
	}
	else{
		echo "<tr><td colspan='3' style='height:100px'>No records to display </td></tr>";
	}
	
	$result->close();
	echo"</tbody>
			
			</table>
		</div>
	</div>";
	closeDbConnection();
?>

					
				
	<div class="col50">
		<div class="whiteWrapper" id="calendar" >  
		</div>
		<div id='script-warning'>
			<code>php/get-events.php</code> must be running.
		</div>
		<div id='loading'>loading...</div>
	</div>
	<div class="clr"></div>
	<div class="margTop20">
		<div class="col50">
			<div class="whiteWrapper" style="height:200px">
			<div>
			<div style="background: none repeat scroll 0 0 #eef1fa;olor: #b0b4bf;padding:15px;">Input your studied Hours</div>
				<table>
					<tr>
						<td style="padding:5px">Subject</td>
						<td style="padding:5px">Java</td>
					</tr>
					<tr>
						<td style="padding:5px">Actual Hours dedicated for studying</td>
						<td style="padding:5px"><input type="text" name="actual" value="2" readonly></td>
					</tr>
					<tr>
						<td style="padding:5px">Actual Hours Studied</td>
						<td style="padding:5px"><input type="text" name="actual" value="" ></td>
					</tr>
				</table>
				<input id="save" type="button" value="save" class="btnyellow"/>
			</div>
		</div>
		</div>
		<div class="col50" style="height:200px">
			<div class="whiteWrapper" style="height: inherit;">
			<div class='pad10'>
			<a href="motivational.php" style="color:rgb(58,135,173); font-size:14px">
				<?php
				openDbConnection();
			$sqlStatus = <<<SQL
	select * from udates where id_user='$idUser';
SQL;

	if(!$result = $db->query($sqlStatus)){
		die('There was an error running the query [' . $db->error . ']');
	}
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
			echo $row['udates'];		
		}
	}	
	$result->close();
	closeDbConnection();
?>
			</a>
			</div>
</div>
		</div>
	</div>

	
</div>

<script>
	
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
				right: 'month,basicWeek,basicDay'
			},
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

$(".menu li").eq(0).addClass("menuSelected");
$(".menuSelected .selected").show();
$(".menuSelected .normal").hide();
</script>



<?php include_once("footer.php"); ?>