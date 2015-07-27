
<!--<!DOCTYPE HTML>
<html>
<head>
<title>Pin-UP</title>
<link rel="stylesheet" type="text/css" href="css/common.css"></link>
<link rel="icon" type="image/x-icon" href="img/favicon.ico"/>
</head>
<body>-->

<div class="enlgWrapper">
	<div class="pinActTab clearfix" >
		<div class="repin">
		<?php include 'pinterestDB.php';
		include 'pinterestSession.php';
		
			
						$img=$_GET['para'];
						
						$query_userID="Select uid from user where email='".$_SESSION['userid']."'";
						
						$result_userId=runQuery($query_userID,1);
						$row_userId=mysql_fetch_row($result_userId);
						$userid=$row_userId[0];
						
						$act='active';
						$query="select pins.pinid from pins,pinnedon where pins.pinid=pinnedon.pinid and pins.imgSrc='$img' and pinnedon.boardid  in (select boardid from boardcreator where uid='$userid')";
						$result=runQuery($query,1);
						$num_rows = mysql_num_rows($result);
						if($num_rows>0)
						{
							$act='deact';
						}
						$row=mysql_fetch_row($result);
			
			echo "<button data-element-type='0' type='button' class='pin pinupBtn $act'><em></em><span class='accessibilityText'> Pinup</span></button>";
			$query="select pinnedon.pinid,count(pinnedon.pinid)-1 from pins, pinnedon where pins.pinid=pinnedon.pinid and pins.imgSrc='$img'";
			$result=runQuery($query,1);
			$row=mysql_fetch_row($result);
			$pinId=$row[0];
			echo "<button class='repinNo $act'><span class='buttonText'>$row[1]</span></button>";
		
			
			?>
			
		</div>
		<button class='del'>delete</button>
		<div class="like rgt" style="">
				<?php 
		
						$like="Like";
						$act='active';
						
						$query="select * from likes where pinid='".$GLOBALS['pinId']."' and uid='".$GLOBALS['userid']."'";
						$result=runQuery($query,1);
						$num_rows = mysql_num_rows($result);
						$imgDisp="display:inline";
						if($num_rows>0)
						{
							$act='deact';
							$like="Unlike";
							$imgDisp="display:none";
						}
						$row=mysql_fetch_row($result);
		
			echo "<button data-element-type='0' type='button' class='pinupBtn $act likebtn'><em></em><span class='accessibilityText'> $like</span><img src='img/image_crops/like.png' height='14px' width:='16px' style='$imgDisp'/></button>";
			$query="select count(*) from likes  where pinid='".$GLOBALS['pinId']."'";
			$result=runQuery($query,1);
			$row=mysql_fetch_row($result);
			echo "<button class='repinNo $act'><span class='buttonText'>$row[0]</span></button>";
			
			?>
		</div>	

	</div>
	<div class="imgContainer">
		<div style="margin:0 auto;width:60%;padding:25px 0">
		<?php 
		echo "<a href=''><img id='engdImg' data-id='".$GLOBALS['pinId']."' width='100%' src='".$GLOBALS['img']."'/></a>";
		?>
		
		</div>
		<div class='uploaderDetails'>
			<?php
			
			$query="select image_location,firstname,lastname from pincreator,user where user.uid=pincreator.uid and pincreator.pinid='".$GLOBALS['pinId']."'";
			$result=runQuery($query,1);
			$row=mysql_fetch_row($result);
			echo "<div class='uploaderPic'>";
			echo "<div style='width:90%;margin:0 auto'><img src='$row[0]' style='width:100%' align='middle' style='margin:0 auto;'/></div>";
			echo "</div>";
			echo "<div class='uploaderName'><a style='' href=''>";
			echo $row[1]."  ".$row[2];
			echo "</a></div>";
			$query_pinDes="select description from pins where pinid='".$GLOBALS['pinId']."'";
			$result=runQuery($query_pinDes,1);
			$row=mysql_fetch_row($result);
			echo "<p class='imgDescription'>$row[0]</p>";
				
			?>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="comments">
		<div class='commenters'>
			<?php
			
			$query="select  firstname,lastname,image_location,usrcomments from comments,user where comments.uid=user.uid and comments.pinid='".$GLOBALS['pinId']."'";
			$result=runQuery($query,1);
			$row=mysql_fetch_array($result);
			echo "<div id='existingCom'>";
			while($row = mysql_fetch_array($result))
			{  	echo "<div style='border-bottom:1px solid #E3E3E3;padding-left:20px;padding-top:10px;padding-bottom:10px'>";
				echo "<div class='uploaderPic'>";
				echo "<div style='width:90%;margin:0 auto'><img src='$row[image_location]' style='width:100%' align='middle' style='margin:0 auto;'/></div>";
				echo "</div>";
				echo "<div class='uploaderName'><a style='' href=''>";
				echo $row['firstname']."  ".$row['lastname'];
				echo "</a></div>";
				echo "<div class='imgDescription'>$row[usrcomments]";
				echo "</div><div class='clearfix'></div></div> ";
				
			}
			
			echo "</div>";
			$query="select  firstname,lastname,image_location from user where uid='".$GLOBALS['userid']."'";
			$result=runQuery($query,1);
			$row=mysql_fetch_row($result);
			echo "<div style=';padding-left:20px;padding-top:10px;padding-bottom:10px'>";
			echo "<div class='uploaderPic'>";
			echo "<div style='width:90%;margin:0 auto'><img src='$row[2]' style='width:100%' align='middle' style='margin:0 auto;'/></div>";
			echo "</div>";
			echo "<div class='uploaderName'><a style='' href=''>";
			echo $row[0]."  ".$row[1];
			echo "</a></div>";
			echo "<div class='imgDescription'><textarea id='userCom' autofocus='' placeholder='Add a short description to our board' name='bName' type='text'></textarea></div>";
			

			echo "</div><div class='clearfix'></div></div> ";
				
			?>
						<div class="clearfix"></div>
		</div>
	</div>
	<?php echo "<input type='hidden' id='userDetail' name='user' value='".$GLOBALS['userid']."'>"?>
</div>
	
<!--</body>  -->              
<!--<div class="repinLike">
                    
                    
                    
        
    

    
<span class="buttonText">2</span>
        </button>

                                <button data-text-unlike="Unlike" data-element-type="1" data-text-like="Like" type="button" class="medium rounded PinLikeButton Button like leftRounded pinActionBarButton hasText Module ajax btn">




<em></em>
<span class="buttonText">Like</span>
        


</button>
    <button data-element-type="175" type="button" class="medium rounded NavigateButton repinLikeNavigateButton like leftRounded pinActionBarButton Button hasText IncrementingNavigateButton ajax Module btn">







<span class="buttonText">1</span>
        </button>

                                        <a href="http://feedly.com/e/650erlRc" data-element-type="162" rel="nofollow" type="button" class="medium rounded website pinActionBarButton NavigateButton Button hasText Module ajax btn">


<em></em>
<span class="buttonText">Website</span>
                </a>
            </div>

<div class="shareGear">
                        <div class="ajax DropdownButton Module">

<button data-element-type="98" type="button" class="medium rounded Button hasText Module ajax btn send pinActionBarButton">

<em></em>
<span class="buttonText">Send</span>
        </button></div>
        
        <div class="ajax DropdownButton Module">

<button data-element-type="72" type="button" class="medium rounded Button Module ajax share pinActionBarButton btn">

<em></em>
<span class="accessibilityText">Share</span></button></div>
    </div>
		
		
		</div>
	
	</div>



<div>--!