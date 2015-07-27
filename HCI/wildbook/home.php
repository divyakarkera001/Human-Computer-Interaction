<?php include("header.php"); ?> 

<div class="pinitems">
	<?php
		//$query="select imgSrc,repinCount,likes,com_no from pins";
		$userEmail = getUserID();
		//echo $userEmail;
		//$query="select P.p_id as PID, PC.content as PCContent, P.likes as PLikes, PC.content_type as PCType from user U inner join post P on U.u_id = P.u_id inner join post_content PC on P.p_id = PC.p_id where U.email = '$userEmail';";
		$query="select PC.content as PCContent, P.likes as PLikes, PC.content_type as PCType from post P inner join post_content PC on P.p_id = PC.p_id inner join user UIN on UIN.u_id = P.u_id where UIN.u_id in ( select FRND.u_id from user U inner join friends F on U.u_id = F.u1_id inner join user FRND on F.u2_id = FRND.u_id and U.email = '$userEmail');";
		//$query= "select content from post_content";
		//echo $query;
		$result=runQuery($query,1);
		//echo "hello";
		while($row = mysql_fetch_array($result))
		{  
			//echo $row['PCContent'];

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
		echo "<input type='hidden' id='userDetail' name='user' value='".$userEmail."'>"
	
	?>
	<div class='clearfix'></div>
</div>
<div class='clearfix'></div>

<!--Start of overlay-->
<div id="imgEnlarge" style="display:none">

   <img src="img/image_crops/close_button.png" style="position:fixed;top:4%;right:0.5%" id="close"/>
   <div id="enlargeImgDtl">
   </div>
	
</div>
<div id="mask"></div>
<!--board table-->
<div id="boardSelForm" style="z:500px;display:none;width:30%;position:absolute;top:40%; left:30%;border:1px solid #000">
	
	<form method="post" action="loginCheck.php" enctype="multipart/form-data">
	<div style="padding:10px;border-bottom:1px solid #aeaeae"><h3>Choose Pin</h3></div>
	<div>
		<table cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr>
				<td><label>Description</label></td>
				<td><div><textarea id="pinDes" required="" type="text" name="bName" placeholder="Add a short description to our board" autofocus=""></textarea></div></td>
			</tr>
			
			<tr>
				<td><label>Select Board</label></td>
				<td>
					
						<select id="boardSel">
								<option><span>Select Board</span></option>
								<?php
									/*$query="select boardid,boardname from board where boardid in(select boardid from boardCreator,user where user.uid=boardCreator.uid and user.email='".$_SESSION['userid']."')";
									
									$result=runQuery($query,1);
									while($row = mysql_fetch_array($result))
									{  
										echo "<option value='$row[boardid]'>$row[boardname]</option>";    
								   
									}*/
						
								?>
							</select>

				</td>
			</tr>
		</tbody></table>
		
		
	</div>

	<div class="createButton" style="align:right">
		<input id="addPin" value="Add Pin" type="button">
		<button type="reset" id="closebtn">Close</button></div>
	</form>


</div>
<!--End of board table-->
	<!--End of Overlay-->
	<script type="text/javascript">
	/*$( ".itemWrapper > div img" ).click(function() {
		$('#mask').show();
		$('#imgEnlarge').show();
		var src=$(this).attr('src');
		//alert(src);
		$.ajax({url:"DetailImg.php",
					type: 'get',
					data: { 'para': src},
						success:function(result){
						$("#enlargeImgDtl").html("");
						$("#enlargeImgDtl").append(result);
						}
					});
		
		
	});*/
	$(document).on('click', '.itemWrapper', function() {
		para_type = $(this).attr('data-cont');
		para_text = $(this).find('span').html();
		//alert(para_text);
		$('#mask').show();
		$('#imgEnlarge').show();
		var src=$(this).find('.postpic').attr('src');
		$.ajax({url:"DetailImg.php",
					type: 'get',
					data: { 'para': src, 'para_type': para_type, 'para_text':para_text},
						success:function(result){
						$("#enlargeImgDtl").html("");
						$("#enlargeImgDtl").append(result);
						}
					});	
	});
	
	
	
	
	$("#close").click(function() {
		/*$('#mask').hide();
		$('#imgEnlarge').hide();*/
		window.location.href ="home.php";
		});
		$("#closebtn").click(function(){
			$("#boardSelForm").hide();
			$("#enlargeImgDtl").attr('style','opacity:1');
		})
		
		$(document).on('click', '.pin.active', function() {
			$("#boardSelForm").show();
			$("#enlargeImgDtl").attr('style','opacity:0.3');
		/*$(this).addClass('deact').removeClass('active');
		$(this).siblings().removeClass('active').addClass('deact');
		var count= parseInt($(this).next().find('.buttonText').text())+1;
		$(this).siblings().find('.buttonText').text(count);*/
		
		
		/*removeClass('active').addclass('deact');	*/	
	});
	$("#addPin").click(function(){
		var uid=$('#userDetail').val();
		var pinid=$('#engdImg').attr('data-id');
		var selIndx=$("#boardSel")[0].selectedIndex;
		if(selIndx>0)
		{
			var bId=$('#boardSel').val();
			$.ajax({url:"update_record.php",
					type: 'get',
					data: { 'para1': bId,'para2': pinid,'action':'','On':'pin'},
						success:function(){
							$("#boardSelForm").hide();
							$("#enlargeImgDtl").attr('style','opacity:1');
							$('.repin .pin').addClass('deact').removeClass('active');
							$('.repin .pin').siblings().removeClass('active').addClass('deact');
							var count= parseInt($('.repin .pin').next().find('.buttonText').text())+1;
							$('.repin .pin').siblings().find('.buttonText').text(count);
						}
					});
			
		}
	});
	$(document).on('click', '.likebtn', function() {
		var act;
		var uid=$('#userDetail').val();
		//var pinid=$('#engdImg').attr('data-id');
		var imageName=$('#engdImg').attr('src');
		var type = $('#engdImg').attr('data-type');
		var textVal = $('#engdImg').text();
		//alert(type);
		//alert(imageName)
		var count= parseInt($(this).next().find('.buttonText').text());

		//alert($(this).children('img').attr('src'))
		
		if($(this).children('img').is(":visible"))
		{
			$(this).children('img').hide();
			$(this).children('span').text('Unlike');
			act='insert';
			$(this).siblings().find('.buttonText').text(count+1);
			count = count + 1;
		}
		else
		{
			$(this).children('img').show();
			$(this).children('span').text('Like');
			act='delete';
			$(this).siblings().find('.buttonText').text(count-1);
			count=count-1;
		}
		//alert("couynt:" + count + act);
		$.ajax({url:"update_record.php",
					type: 'get',
					data: { 'para1': imageName,'para_textVal': textVal,'para_type': type,'para2': count,'action':act,'On':'like'},
						success:function(){
						//alert("Reached");
						}
					});
	});
	$(document).on('keypress', '#userCom', function(e) 
	{
	 if (e.which == 13) 
	 {
        var x=$.trim($('#userCom').val());
		//$('#userCom').val('');
		var postContent = "";
		var uid=$('#userDetail').val();
		//var uid = getUserID();
		alert (uid);
		//var pinid=$('#engdImg').attr('data-id');
		var postType = $('#engdImg').attr('data-type');
		if(postType == 'pic')
		{
			postContent = $('#engdImg').attr('src');
		}
		else
		{
			postContent = $('#engdImg').text();
		}
		$.ajax({
			url:"update_record.php",
			type: 'get',
			data: { 'para1': uid, 'posttype':postType,'On':'comment','action':x, 'postContent':postContent},
			success:function(result)
			{
				//alert(result);
				$("#existingCom").html("");
				$("#existingCom").append(result);
			}
		});
		//alert(x + " " + postType + " " + postContent);
					
     }
	});
	$(document).on('click', '.tblattr', function() {
		$('.attrSel').find('.tblnamattr').remove();
		$('.attrSel').removeClass('attrSel');
		$(this).addClass('attrSel');
		ajaxCall('getTblNamonAttr',$(this).text(),$(this));
		
		
	});
		
		
	</script>
<?php include("footer.php"); ?>