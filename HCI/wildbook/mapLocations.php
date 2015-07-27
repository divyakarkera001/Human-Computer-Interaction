<html>
<head>
<?php include("header.php"); ?> 
<!--script src="//maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script-->
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() 
    {
    	alert("Reached Here");
    	var keyLocData=[];
		var map, pointarray, heatmap;
		$.ajax({
			type: 'get',
            url: "getMapData.php",
            //dataType: "JSON",            
            success: function(data) 
            {
            	//alert(data);
            	var locationList = data.split(":");
            	var arrayLength = locationList.length;
            	for (var i=0; i< arrayLength; i++)
            	{
            		if(locationList[i] != "")
            		{
            			var latlong = locationList[i].split(",");
            			alert (latlong);
            			keyLocData.push([parseFloat(latlong[0]),parseFloat(latlong[1]),latlong[2]]);
            		}
            			//alert(locationList[i].split(",")[0] + "::" + locationList[i].split(",")[0]);
            	}
            	//alert(keyLocData);

            	/*$.each(data, function(idx, obj) 
            	{
            		//alert(parseFloat(obj.lat));
            		//alert(parseFloat(obj.lng));
            		//locData.push([parseFloat(obj.lat),parseFloat(obj.lng)]);

            		
            	});*/
            	initialize(keyLocData);
            }
		});
		function initialize(keyLocData)
		{
			alert("ASD");
			var mapOptions = 
			{
				zoom: 2,
				center: new google.maps.LatLng(37.774546, -122.433523),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			setMarkers(map,keyLocData);
		}

		function setMarkers(map,locations)
		{
        	var marker, i
        	for (var i = 0; i < locations.length; i++)
        	{	
        		var lat = locations[i][0];
        		var longi = locations[i][1];
        		//alert(locations[i][0]);
        		//alert(locations[i][1]);
        		latlngset = new google.maps.LatLng(lat, longi);
        	 	var marker = new google.maps.Marker(
        	 	{  
        	        map: map, title:locations[i][2] , position: latlngset, icon:'https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle_blue.png'  
        	    });
        	    map.setCenter(marker.getPosition()); 	
        	    //var content = locations[i][2];    
        	 	//var infowindow = new google.maps.InfoWindow();

        		/*google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        	       return function() {
        	          infowindow.setContent(content);
        	          infowindow.open(map,marker);
        	       };
        	   	})(marker,content,infowindow)); */

        	}
        }

	});
		</script>
	</head>

<body>
	<div id="map-canvas"></div>
	 <!--iframe src="http://techcrunch.com"></iframe-->
</body>
</html>