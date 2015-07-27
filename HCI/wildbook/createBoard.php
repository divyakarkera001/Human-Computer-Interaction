
<?php include 'header.php';?>

<div class="boardContainer">
	<div class="navMenu">
		<a id="board" href="javascript:void(0)" class="lft sel"><span></span><img src="img/image_crops/boards.png" height="16px" width="16px"/></a>
		<a id="pins" href="MyPinnedOn.php" class="lft"><span></span><img src="img/image_crops/pinup.png" height="16px" width="16px"/></a>
		<a id="likes" class="lft" href="Mylikes.php"><span></span><img src="img/image_crops/like.png" height="16px" width="16px"/></a>
		<a id="stream" class="lft" href="streams.php"><span> </span><img src="img/image_crops/share.png" height="16px" width="16px"/> </a>
		<!--<a id="follow" class="rgt"><span> </span> Followers</a>
		<a id="follower" class="rgt"><span> </span> <span>Following</span></a>-->
		
		<div class='clearfix'></div>
	</div>

	<div>
		<article>
			<div class='boardWapper' style="background:none">
				<div id="crtBrd" style="padding:10px;background:url('img/image_crops/create_bg.png')no-repeat;height:100%">
					<img  src='img/image_crops/add_board.png' height="40px" width="40px"align="middle" />
				</div>
			</div>
		</article>
		<?php
		$user=$_SESSION['userid'];
		$query ="call getuserBoards('$user')";

		$result=runQuery($query,1);
		$num_rows = mysql_num_rows($result);
		$row = mysql_fetch_row($result);
		$previd= $row[0];
	
		$totBoard=0;
		if($num_rows>0)
		{
			echo "<article>";
			echo "<div style='border:1px solid #b1b1b1;overflow:hidden' class='boardWapper pinBoard' data-board='$previd'><div class='boardTitle'>$row[2]</div>";
			echo "<div style='height:100%'>";
			echo "<a href='javascript:void(0);' class=''><img  class='boardImg' src='$row[1]'/></a>";
			while($row = mysql_fetch_array($result))
			{
				if($previd!=$row['boardid'])
				{	$previd=$row['boardid'];
					echo "</div>";
					echo "</div>";
					echo "</article>";
					echo "<article>";
					echo "<div style='border:1px solid #b1b1b1;overflow:hidden' class='boardWapper pinBoard' data-board='$previd'><div class='boardTitle'>$row[boardName]</div>";
					echo "<div style='height:100%'>";
					echo "<a href='javascript:void(0);' class=''><img class='boardImg' src='$row[imgSrc]'/></a>";
					
					
				}
				else 
				{	
					echo "<a href='javascript:void(0);' class=''><img class='boardImg' src='$row[imgSrc]'/></a>";
				
				}
			
			}
			echo "</div>";
			echo "</div>";
			echo "</article>";
		}
		
	?>
	</div>
	
	<div class='clearfix'></div>
</div>
<script language="JavaScript" type="text/javascript">
$('.pinBoard').click(function() {
				var boardIndx=$(this).attr('data-board');//[0].selectedIndex;
				
				var url="MyPins.php?a="+boardIndx;
				
				window.location.href = url;
					//$().redirect('MyPins.php', {'para': boardIndx});
					//window.location="MyPins.php";
					/*$.ajax({url:"MyPins.php",
					type: 'get',
					data: { 'para': boardIndx},
						success:function('ss'){
						//$("#pageContainer").html("");
						//$("#pageContainer").append(result);
						alert('hjkk');
						//location.replace();
						window.location="";
						window.location.replace("http://www.w3schools.com");
						}
					});*/
					 
				
				
			});

</script>
<!--Start of overlay-->
<div class="createBoard" style="display:none">
	<form method="get" action="loginCheck.php">
	<div style="padding:10px;border-bottom:1px solid #aeaeae"><h3>CREATE BOARD</h3></div>
	<div>
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td><label>Board Name</label></td>
				<td><div><input type="text" name="bName" placeholder="ex: For the Home" required autofocus=""/></div></td>
			</tr>
			<tr>
				<td><label>Board Description</label></td>
				<td><textarea type="text" name="bDescription" placeholder="Add a short description to our board" required autofocus=""></textarea/></td>
			</tr>
			<tr>
				<td><label>Select Category</label></td>
				<td>
					
						<div class="styled-select">
							<select id="categorySort" name='categorySelection'>
								<option><span>Search Category</span></option>
								<?php
									$query="select ctitle from category";
									
									$result=runQuery($query,1);
									while($row = mysql_fetch_array($result))
									{  
										echo "<option>$row[ctitle]</option>";    
								   
									}
						
								?>
							</select>
						</div>

				</td>
			</tr>
		</table>
		
		
	</div>

	<div class="createButton" style="align:right">
		<input type="button" value="Create Board" onClick="this.form.action='createBoardSQL.php';this.form.submit()">
		<button type="reset" id="close">Close</div>
	</div>
	
	</form>
</div>
<div id="mask"></div>
	<!--End of Overlay-->
	<script type="text/javascript">
	$( "#crtBrd" ).click(function() {
		
		$('#mask').show();
		$('.createBoard').show();
		
	});
	$("#close").click(function() {
		$('#mask').hide();
		$('.createBoard').hide();
		});
	</script>
<?php include 'footer.php';?>
