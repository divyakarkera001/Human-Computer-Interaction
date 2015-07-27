
<div class="pinitems" style="padding:10px 27px 10px 28px">
	<?php
	include 'pinterestDB.php';
		$id = $_GET['para'];


		//$query="select pins.imgSrc from pinnedon,pins,board where pinnedon.boardid=board.boardid and pinnedon.pinid=pins.pinid and board.categoryid='$id';";
		$query="select P.likes as PLikes,PC.content as PCContent, PC.content_type as PCType from post_content PC inner join post P on P.p_id = PC.p_id inner join post_for_activity PFC on P.p_id = PFC.p_id inner join activity A on A.act_id = PFC.act_id inner join interest_category IC on IC.ic_id = A.ic_id where IC.Name = '$id' and p.access_ctl = 0;";
		//echo $query;
		$result=runQuery($query,1);
		//echo $result	
		if(mysql_num_rows($result)<=0)
		{
			//echo "FOund no entry"
			echo "<div style='position:absolute;top:50%;left:35%;font-family:pinupFont;font-size:25px'>Apologies No Item in this Category</div>";
		}
		else
		{
			while($row = mysql_fetch_array($result))
			{  
				if($row['PCType']=='pic')
				{
					$imgSrc = $row['PCContent'];
					echo "<article><div class='itemWrapper'><div style='padding:10px'><img src='$imgSrc' width='100%' height='300px'/><div style='border-width:1px 0;border-style:dotted;border-color:#cdcdcd;margin-top:10px 0'><div class='lft icon'><img src='img/image_crops/like.png'/><span>".$row['PLikes']."</span></div><div class='icon rgt'><img src='img/image_crops/comments.png'/><span>$row[com_no]</span></div><div class='clearfix'></div></div></div></div></article>";
					//echo "<article class='articleWrapper'><div class='itemWrapper'><a style='padding:10px'>".$row['PCContent']."</a></div></article>";
				}
				else
				{
					//$text = ''.$row['PCContent']
					echo "<article><div class='itemWrapper'><div style='padding:10px'>".$row['PCContent']."<div style='border-width:1px 0;border-style:dotted;border-color:#cdcdcd;margin-top:10px 0'><div class='lft icon'><img src='img/image_crops/like.png'/><span>".$row['PLikes']."</span></div><div class='icon rgt'><img src='img/image_crops/comments.png'/><span>$row[com_no]</span></div><div class='clearfix'></div></div></div></div></article>";
				}     
			}
		}
	//echo "happy birthday"
	?>
		<div class='clearfix'></div>
</div>
<div class='clearfix'></div>