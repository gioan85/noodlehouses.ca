function initialize() {
  var map_canvas = document.getElementById('map_canvas');
  var myLatlng = new google.maps.LatLng(49.270902, -122.754399);
  var map_options = {
	center: myLatlng,
	zoom: 16,
	mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(map_canvas, map_options);
  var text;
  text= "<b style='color:#be382d; display: inline-block;'>1466 Prairie Avenue, Port Coquitlam, BC V3B 5M8<br />" + "</b>";
  var infowindow = new google.maps.InfoWindow(
  { content: text,
	  size: new google.maps.Size(5000,300),
	  position: myLatlng
  });
  infowindow.open(map);    
  var marker = new google.maps.Marker({
	position: myLatlng, 
	map: map
  });
}
google.maps.event.addDomListener(window, 'load', initialize());