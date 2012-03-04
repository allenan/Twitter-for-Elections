<?php
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'api.php';


	$list = array ( 'AL','AK', 'AZ','AR', 'CA','CO','CT', 'DE', 'FL', 'GA', 'HI', 'ID','IL', 'IN','IA','KS','KY',
		        'LA','ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO','MT','NE', 'NV', 'NH', 'NJ','NM','NY', 'NC', 'ND',
			'OH','OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA','WA', 'WV', 'WI', 'WY');
	
	//-170.5957,18.7763,-66.8850749,71.5388//U.S
	//-90.31, 41.41,-82.26,48.15 //michigan
	$opts = array(
		'http'=>array(
			'method' => "POST",
			'content' => 'locations=-170.5957,18.7763,-66.8850749,71.5388',
                        'header' => "Content-Type: application/x-www-form-urlencoded\r\n"  )
		);
      
      
	$db = mysql_connect('localhost', 'root', 'whosthat');    
	mysql_select_db('twitter', $db);  
 
	$context = stream_context_create($opts);
	
	while (1){
		
		$instream = fopen('https://alsulaiman:whatever123@stream.twitter.com/1/statuses/filter.json','r' ,false, $context);
		
		while(! feof($instream)) {
			
			if(! ($line = stream_get_line($instream, 20000, "\n"))) {
			continue;
			
			}
			
			else{
				$tweet = json_decode($line);
				
				$lat = ( ($tweet->{'place'}->{'bounding_box'}->{'coordinates'}[0][0][1]) );
				$lng = ( ($tweet->{'place'}->{'bounding_box'}->{'coordinates'}[0][0][0])); //take the smallest longtitude
				
				$latlng = $lat ."," .$lng;
				
				$state = Bing($latlng); //lookup($latlng);
				 
				 if (in_array($state, $list)) {
						$id = mysql_real_escape_string($tweet->{'id'});
						$text = mysql_real_escape_string($tweet->{'text'});
						$user = mysql_real_escape_string($tweet->{'user'}->{'screen_name'});
						
						$lat = mysql_real_escape_string($lat);
						$lng = mysql_real_escape_string($lng);
						
						$query = mysql_query("INSERT INTO nlp (id, text, user, date, state, lat, lng) VALUES ('$id', '$text', '$user', NOW(), '$state', '$lat', '$lng' )");
						if (!$query) {echo "Mysql Error: ".mysql_error();}
						
				} //if the tweet inside the U.S*/
				
				flush();
			
			}//else
			
		}//while instream
		
	}


?>