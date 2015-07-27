
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
			$userID=$_SESSION['userid'];
			$act='active';
			$type = $_GET['para_type'];
			$text = $_GET['para_text'];

			echo "<button data-element-type='0' type='button' class='pin pinupBtn $act'><em></em><span class='accessibilityText'> WildBook</span></button>";
			echo "<button class='repinNo $act'><span class='buttonText'></span></button>";
		?>
			
	</div>
		<button class='del'>delete</button>
		<div class="like rgt" style="">
		<?php 
		
			$like="Like";
			$act='active';
			$img=$_GET['para'];

			#$query="select * from likes where pinid='".$GLOBALS['pinId']."' and uid='".$GLOBALS['userid']."'";
			if( $type == 'pic' )
			{
				$query="select P.likes as postLikes from post P inner join post_content PC on P.p_id = PC.p_id where PC.content = '$img'";
			}
			if( $type == 'text' )
			{
				$query="select P.likes as postLikes from post P inner join post_content PC on P.p_id = PC.p_id where PC.content = '$text'";
			}	
			echo "<button data-element-type='0' type='button' class='pinupBtn $act likebtn'><em></em><span class='accessibilityText'> $like</span><img src='img/image_crops/like.png' height='14px' width:='16px' style='$imgDisp'/></button>";
			#$query="select count(*) from likes  where pinid='".$GLOBALS['pinId']."'";
			$result=runQuery($query,1);
			$row=mysql_fetch_row($result);
			echo "<button class='repinNo $act'><span class='buttonText'>$row[0]</span></button>";
			
			?>
		</div>	

	</div>
	<div class="imgContainer">
		<div style="margin:0 auto;width:60%;padding:25px 0">
		<?php 
		if( $type == 'pic' )
		{
			echo "<a href=''><img id='engdImg' data-type='pic' data-id='".$GLOBALS['pinId']."' width='100%' src='".$GLOBALS['img']."'/></a>";
		}
		if( $type == 'text' )
		{
			echo "<a href=''><span id='engdImg' data-type='text' data-id='".$GLOBALS['pinId']."' width='100%' >".$text."</span></a>";
		}	
		
		?>
		
		</div>
		<div class='uploaderDetails'>
			<?php
			
			//$query="select image_location,firstname,lastname from pincreator,user where user.uid=pincreator.uid and pincreator.pinid='".$GLOBALS['pinId']."'";
			$uploaderQuery = "select distinct(U.email) as uploaderId from post P inner join post_content PC on P.p_id = PC.p_id inner join user U on U.u_id = P.u_id where PC.content = '$img'";
			$result=runQuery($query,1);
			$row=mysql_fetch_row($result);
			echo "<div class='uploaderPic'>";
			echo "<div style='width:90%;margin:0 auto'><img src='img/default_user.png' style='width:100%' align='middle' style='margin:0 auto;'/></div>";
			echo "</div>";
			echo "<div class='uploaderName'><a style='' href=''>";
			echo $row['uploaderId'];
			echo "</a></div>";
			?>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="comments">
		<div class='commenters'>
			<?php

				$PIdQuery = "select P.p_id as PId from post P inner join post_content PC on P.p_id = PC.P_id and PC.content = '$img'";
				$resultPId=runQuery($PIdQuery,1);
				while($row = mysql_fetch_array($resultPId))
				{
					$PId = $row['PId'];
					//echo $PId;
				}

				$commentReadquery="select C.comment_str as ComStr, U.email as UMail, C.commented_on as ComOn from comment C inner join user U on C.u_id = U.u_id where C.p_id = $PId";
				//echo $commentReadquery;
				$result=runQuery($commentReadquery,1);
				echo "<div id='existingCom'>";
				while($row = mysql_fetch_array($result))
				{  	
					echo "<div style='border-bottom:1px solid #E3E3E3;padding-left:20px;padding-top:10px;padding-bottom:10px'>";
					echo "<div class='uploaderPic'>";
					echo "<div style='width:90%;margin:0 auto'><img src='img/default_user.png' style='width:100%' align='middle' style='margin:0 auto;'/></div>";
					echo "</div>";
					echo "<div class='uploaderName'><a style='' href=''>";
					echo $row['UMail']." on ".$row['ComOn'];
					echo "</a></div>";
					echo "<div class='imgDescription'>$row[ComStr]";
					echo "</div><div class='clearfix'></div></div> ";
			}
			
			echo "</div>";
			$query="select  email from user where uid='".$GLOBALS['userid']."'";
			$result=runQuery($query,1);
			$row=mysql_fetch_row($result);
			echo "<div style=';padding-left:20px;padding-top:10px;padding-bottom:10px'>";
			echo "<div class='uploaderPic'>";
			echo "<div style='width:90%;margin:0 auto'><img src='img/default_user.png' style='width:100%' align='middle' style='margin:0 auto;'/></div>";
			echo "</div>";
			echo "<div class='uploaderName'><a style='' href=''>";
			echo $row[0];
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