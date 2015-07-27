<?php include("header.php"); ?> 

<div class="boardContainer">
	<div class="navMenu">
		<a id="board" href="createBoard.php" class="lft"><span></span><img src="img/image_crops/boards.png" height="16px" width="16px"/></a>
		<a id="pins" href="javascript:void(0)" class="lft sel"><span></span><img src="img/image_crops/pinup.png" height="16px" width="16px"/></a>
		<a id="likes" class="lft" href="Mylikes.php"><span></span><img src="img/image_crops/like.png" height="16px" width="16px"/></a>
		<a id="stream" class="lft" href="javascript:void(0)"><span> </span><img src="img/image_crops/share.png" height="16px" width="16px"/> </a>
		<!--<a id="follow" class="rgt"><span>8 </span> Followers</a>
		<a id="follower" class="rgt"><span>169 </span> <span>Following</span></a>-->
		
		<div class='clearfix'></div>
	</div>
</div>
<div class="pinitems pinBrd">
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
	
		$query="select PC.content as PCContent, P.likes as PLikes, PC.content_type as PCType from user U inner join post P on U.u_id = P.u_id inner join post_content PC on P.p_id = PC.p_id where U.email = '$user';";
		$result=runQuery($query,1);
		while($row = mysql_fetch_array($result))
		{  
			#$count=$row[repinCount]-1;
			#echo "<article><div class='itemWrapper'><div style='padding:10px'><img src='$row[imgSrc]' width='100%' height='300px'/><div style='border-width:1px 0;border-style:dotted;border-color:#cdcdcd;margin-top:10px 0'><div class='lft icon'><img src='img/image_crops/pinup.png'/><span>$count</span></div><div class='lft icon'><img src='img/image_crops/like.png'/><span>$row[likes]</span></div><div class='icon rgt'><img src='img/image_crops/comments.png'/><span>$row[com_no]</span></div><div class='clearfix'></div></div></div></div></article>";    
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
		echo "<input type='hidden' id='userDetail' name='user' value='".$user."'>"
	
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

<!-- Google Map -->

	<!--<form method="post" enctype="multipart/form-data">
		<div class="mapButton" style="align:right">
			<input id="markOnMap" type="button" value="Mark On Map"/>
			<button type="reset" id="closebtn">Close</div>
		</div>
	</form>-->


<!--Add Board-->
<div class="createBoard" style="display:none">
	<form method="post" enctype="multipart/form-data">
	<div style="padding:10px;border-bottom:1px solid #aeaeae"><h3>Upload Pin</h3></div>
	<div style="padding:10px;border-bottom:1px solid #aeaeae">
			<input type="file" name="file1" id="file1"><br>
			<input type="button" value="Upload File" onclick="uploadFile()" style="margin:10px 0;border-radius:5px;background:#f7f7f7">
			<progress id="progressBar" value="0" max="100" style="width:300px;float:right;margin-right:25px"></progress>
			<h3 id="status"></h3>
			<p id="loaded_n_total"></p>
	</div>
	<div>
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td><label>Mark Location On Map</label></td>
				<td><input type="Button" id="mapButton" name="mapButton" value = "Mark Location"  autofocus=""/></textarea/></td>
			</tr>
			<tr>
				<td><label>Location Name</label></td>
				<td><input type="text" id="mapLocation" name="mapLocation" placeholder="Please Name Of Location"  autofocus=""/></textarea/></td>
			</tr>
			<tr>
				<td><label>Title</label></td>
				<td><input type="text" id="postTitle" name="postTitle" placeholder="Please Enter A Title"  autofocus=""/></textarea/></td>
			</tr>
			<tr>
				<td><label>Description</label></td>
				<td><div><textarea id="pinDes" required type="text" name="bName" placeholder="Add a short description to our board" autofocus=""></textarea/></td>
			</tr>
			<tr>
				<td><label>Link</label></td>
				<td><input type="text" id="pinLink" name="link" placeholder="www.w3cschool.com"  autofocus=""/></textarea/></td>
			</tr>
			<tr>
				<td><label>Select Interest</label></td>
				<td>
					
						<div class="styled-select">
							<select id="boardSel">
								<option><span>Select Interest</span></option>
								<?php
									//$query="select boardid,boardname from board where boardid in(select boardid from boardCreator,user where user.uid=boardCreator.uid and user.email='".$_SESSION['userid']."')";
									$query="select IC.Name as ICCategories from interest_category IC;";
									$result=runQuery($query,1);
									while($row = mysql_fetch_array($result))
									{  
										echo "<option value='$row[ICCategories]'>$row[ICCategories]</option>";    
								   
									}
						
								?>
							</select>
						</div>

				</td>
			</tr>
			<tr>
				<td><label>Select Access Control</label></td>
				<td>
						<div class="styled-select">
							<select id="accessSel">
								<option selected="selected" value='0'>Public</option>
								<option value='1'>Friends Only</option>
								<option value='2'>Friends and Mutual Friends</option>
							</select>
						</div>

				</td>
			</tr>
		</table>
		
		
	</div>

	<div class="createButton" style="align:right">
		<input id="addPin" type="button" value="Add Pin"/>
		<button type="reset" id="closebtn">Close</div>
	</div>
	
	</form>
</div>


<!--End of Add Board-->
<div id="mask"></div>
	<!--End of Overlay-->
	<div class="mapDraw" style="display:none;border:2px solid red" id="mapstyle">
	<!--input type="button" id="mapclose" value="Close Map"/-->
	<!--img src="img/image_crops/close_button.png" style="position:fixed;top:4%;right:0.5%" id="closemap"/-->
fggggggggggg
</div>
<div id = "mapclose" style="align:right" style="display:none">
	<input id="closethemap" type="button" value="Close Map" style="display:none"/>
</div>
	<script type="text/javascript">
	var lat = 999;
	var lng = 999;
	$( "#crtBrd" ).click(function() {
		
		$('#mask').show();
		$('.createBoard').show();
		
	});
	$("#closethemap").click(function()
	{
		//$('#mask').hide();
		$('#mapstyle').hide();
		$('#mapclose').hide();
	});
	$("#closebtn").click(function() {
		$('#mask').hide();
		$('.createBoard').hide();
		});

	$("#mapButton").click(function(){
		//alert("dffjhdjbdhfj");
		//$('#mask').show();
		$("#mapstyle").height($('.createBoard').height());
		$("#mapstyle").show();
		$("#mapclose").show();
		$("#closethemap").show();
		var mapOptions = {
						   zoom: 2,
						   center: new google.maps.LatLng(37.774546, -122.433523),
						   			mapTypeId: google.maps.MapTypeId.ROADMAP
						 };
		map = new google.maps.Map(document.getElementById('mapstyle'), mapOptions);
		google.maps.event.addListener(map, "rightclick", function(event) 
			{
    			lat = event.latLng.lat();
    			lng = event.latLng.lng();
    			latlngset = new google.maps.LatLng(lat, lng);
    			var marker = new google.maps.Marker(
        	 	{  
        	         map: map, title:'hi' , position: latlngset, icon:'https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle_blue.png'  
        	    });
        	    map.setCenter(marker.getPosition());
    			//setMarkers(map,keyLocData);
    			// populate yor box/field with lat, lng
			});

		//alert("Lat=" + lat + "; Lng=" + lng);
					
	});

	$('#addPin').click(function(){
		var selIndx=$("#boardSel")[0].selectedIndex;
		var selAccess=$("#accessSel")[0].selectedIndex;
		//alert(selAccess);
		//alert(lat + " " + lng);
		if(selIndx>0)
		{
			var bId=$('#boardInd').val();
			if($('#fln').val()!="")
			{
				var link=$('#pinLink').val();
				var des=$('#pinDes').val();
				var fileName =$('#fln').val(); 
				var title = $('#postTitle').val();
				var location=$('#mapLocation').val();
				if(title=="")
				{
					alert('Title Is Mandatory Field');
				}
				else if(location == "")
				{
					alert('Please Set A Name For The Location');
				}
				else
				{
					//alert(link);
					//alert(des);
					//alert(fileName);
					var boardId=$('#boardSel').val();
					//alert(boardId);
					$.ajax({url:"UploadPin.php",
					type: 'get',
					data: {'filename': fileName,'desp':des,'link':link,'bid':boardId,'title':title,'access':selAccess,'lat':lat,'lng':lng, 'location':location},
						success:function(r){
						
						//alert("hurray");
						alert(r);
						/*var url="MyPins.php?a="+bId;
						$('#fln').remove();
							window.location.href = url;*/
						}
					});
				}
			}
		
		}
		else
		{
			alert("Please Select An Interest Category");
		}
	});
	/*Script for uploading image file*/
	function _(el){
		return document.getElementById(el);
	}
	function uploadFile(){
		var file = _("file1").files[0];
		var ext = file.name.split('.').pop().toLowerCase();
		var file_type = 'pic';
		if($.inArray(ext, ['gif','png','jpg','jpeg','mp4'])  == -1) 
		{
				alert('invalid extension!');
		}
		else
		{
			if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
			{
				file_type = 'video';
			}
			var formdata = new FormData();
			formdata.append("file1", file);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler, false);
			ajax.addEventListener("load", completeHandler, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", "uploadFile.php");
			ajax.send(formdata);
		}
	}
	
	function progressHandler(event){
		_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
		var percent = (event.loaded / event.total) * 100;
		_("progressBar").value = Math.round(percent);
		_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
	}
	function completeHandler(event){
		_("status").innerHTML = event.target.responseText;
		_("progressBar").value = 0;
	}
	function errorHandler(event){
		_("status").innerHTML = "Upload Failed";
	}
	function abortHandler(event){
		_("status").innerHTML = "Upload Aborted";
	}
	
	/*End of uploading image file*/
	
	$( ".itemWrapper" ).click(function() {
		para_type = $(this).attr('data-cont');
		para_text = $(this).find('span').html();
		//alert(para_type);
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
		window.location.href ="MyPinnedOn.php";
		});
		
		
		$(document).on('click', '.pin.active', function() {
		$(this).addClass('deact').removeClass('active');
		$(this).siblings().removeClass('active').addClass('deact');
		var count= parseInt($(this).next().find('.buttonText').text())+1;
		$(this).siblings().find('.buttonText').text(count);
		
		
		/*removeClass('active').addclass('deact');	*/	
	});
	$(document).on('click', '.del', function() {
		if(confirm("Are you sure you want to delete the pin!"))
		{
			var uid=$('#userDetail').val();
			var pinid=$('#engdImg').attr('data-id');
			//alert(uid);
			//alert(pinid);
			$.ajax({url:"update_record.php",
					type: 'get',
					data: { 'para1': uid,'para2': pinid,'action':'del','On':'delete'},
						success:function(){
						window.location.href ="MyPinnedOn.php";
						}
					});
		}
		else
		{}
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
	$(document).on('keypress', '#userCom', function(e) {
	 if (e.which == 13) 
	 {
        var x=$.trim($('#userCom').val());
        //alert(x);
		//$('#userCom').val('');
		var postContent = "";
		var uid=$('#userDetail').val();
		//var uid = getUserID();
		//alert (uid);
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