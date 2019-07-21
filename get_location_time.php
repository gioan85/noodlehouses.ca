<?php 

//get time of location

function get_timee($country,$city)
{
	//$country = str_replace(' ', '', $country);
	//$city = str_replace(' ', '', $city);
	//$geocode_stats = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=$city+$country,&sensor=false");
	$geocode_stats = file_get_contents("js/map_content.txt");
		
	$output_deals = json_decode($geocode_stats);
	$latLng = $output_deals->results[0]->geometry->location;
	$lat = $latLng->lat;
	$lng = $latLng->lng;    
	//$google_time = file_get_contents("https://maps.googleapis.com/maps/api/timezone/json?location=$lat,$lng&timestamp=1331161200&key=AIzaSyAtpji5Vk271Qu6_QFSBXwK7wpoCQLY-zQ");
	$google_time = file_get_contents("js/map_content2.txt");
	$timez = json_decode($google_time);
	$d = new DateTime("now", new DateTimeZone($timez->timeZoneId));
	return  $d->format('Y-m-d, H:i:s');
}

?>