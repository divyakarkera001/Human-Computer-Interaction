<div class="pinitems" style="padding:10px 27px 10px 28px">
	<?php
	include 'pinterestDB.php';

		$srh = "%".$_GET['para']."%";
		$type=$_GET['type'];
		if($type=='post')
		{
			$query="select  P.p_id as PID, PC.content as PCContent, P.likes as PLikes, PC.content_type as PCType from post P inner join post_content PC on P.p_id =PC.p_id where p.title like '$srh'" ;
		}
		else
		{
			$query="select P.p_id as PID, PC.content as PCContent, P.likes as PLikes, PC.content_type as PCType from user U inner join post P on U.u_id = P.u_id inner join post_content PC on P.p_id = PC.p_id where U.email like '$srh';";
		}
		echo "<div>"; 
	
		
		//echo $query;
		$result=runQuery($query,1);	
		if(mysql_num_rows($result)<=0)
		{
			echo "<div style='position:absolute;top:50%;left:35%;font-family:pinupFont;font-size:25px'>Apologies No Item in this Category</div>";
		}
		else
		
		{
			while($row = mysql_fetch_array($result))
			{  
				
			if($row['PCType']=='pic')
			{
				$imgSrc = $row['PCContent'];
				echo "<article><div class='itemWrapper' data-cont='pic'><div style='padding:10px'><img class='postpic' src='$imgSrc' width='100%' height='300px'/><div style='border-width:1px 0;border-style:dotted;border-color:#cdcdcd;margin-top:10px 0'><div class='lft icon'><img src='img/image_crops/like.png'/><span>".$row['PLikes']."</span></div><div class='icon rgt'><img src='img/image_crops/comments.png'/><span>$row[com_no]</span></div><div class='clearfix'></div></div></div></div></article>";
			}
			else
			{
				//$text = ''.$row['PCContent']
				echo "<article><div class='itemWrapper' data-cont='text'><div style='padding:10px'><span>".$row['PCContent']."</span><div style='border-width:1px 0;border-style:dotted;border-color:#cdcdcd;margin-top:10px 0'><div class='lft icon'><img src='img/image_crops/like.png'/><span>".$row['PLikes']."</span></div><div class='icon rgt'><img src='img/image_crops/comments.png'/><span>$row[com_no]</span></div><div class='clearfix'></div></div></div></div></article>";
			}
			}
		}
		echo "</div>"; 
		//echo "<div class='clearfix'></div> <div boards id='searchboards'>";
			$user=$_SESSION['userid'];
		/*$query ="select board.boardid,pins.imgSrc,board.boardName from pins inner join pinnedon on pins.pinid=pinnedon.pinid inner join board on board.boardid=pinnedon.boardid where board.description like '%".$srh."%' or board.boardName like '%".$srh."%'";

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
		
		echo "</div>";*/
	
	?>
	<script language="JavaScript" type="text/javascript">
$('.pinBoard').click(function() {
				var boardIndx=$(this).attr('data-board');//[0].selectedIndex;
				
				var url="boardPins.php?a="+boardIndx;
				
				window.location.href = url;
									 
				
				
			});

</script>

		<div class='clearfix'></div>
</div>
<div class='clearfix'></div>