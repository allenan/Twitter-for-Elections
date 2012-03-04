<?php

set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', '1');


//--------------------------------  Bing API   --------------------------------------------//
/** just to test the function
$latlng = "33.58,85.85";
Bing ($latlng);
*/

function Bing($latlng) {
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://dev.virtualearth.net/REST/v1/Locations/" . $latlng . "?key=AsteCZlVWiYy850_6hXVGdR-Ht7PesF3XXMzJBlTm3fTPOFMFN2iL6n4vM5wjN-E");
		
	curl_setopt($ch, CURLOPT_TIMEOUT , 200);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
	$response = curl_exec($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
	curl_close($ch);
	
	$address = json_decode ($response, true);
	//print_r ($address);
	$address = (array) $address;
	
	if ($status == 200) {
		
		//print_r($address);
		
		return $address['resourceSets'][0]['resources'][0]['address']['adminDistrict'];
		
	}
	
	else
	return "none";
	
	
}




//--------------------------------  Google API   --------------------------------------------//
	
function lookup ($latlng){
	
	
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://maps.googleapis.com/maps/api/geocode/json?latlng=" . $latlng . "&sensor=false");
	curl_setopt($ch, CURLOPT_TIMEOUT , 200);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);
		
	$address = json_decode ($response, true);
	
	$address = (array) $address;
	$count = count ($address['results'][0]['address_components']);
	
	for ($i = 0; $i < $count; $i++)
	{
	 //get only tweets from within the US
	 if ($address['results'][0]['address_components'][$i]['types'][0] == "country" && $address['results'][0]['address_components'][$i]['short_name'] == "US"){
		
		if ($address['results'][0]['address_components'][$i-1]['types'][0] == "administrative_area_level_1")
		{
			//echo $address['results'][0]['address_components'][$i-1]['short_name'] .":<br>";
			
			return $address['results'][0]['address_components'][$i-1]['short_name'];
		}
		
	 }
	 
	
	
	}
	
	return "none";
	
}


?>