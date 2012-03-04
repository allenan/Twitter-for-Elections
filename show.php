<?php

set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', '1');


	$db = mysql_connect('localhost', 'root', 'whosthat');
	mysql_select_db('twitter', $db);
	
	$voteTerms = array ( 'voting','vote', '#voting','#primary', '#primaries','voted');
	$domain = array ('primary', 'GOP', 'Republican', 'republican', 'gop', 'romney', 'Romney', 'Newt', 'newt');
	
	
	//possible queries..
	$allText = "SELECT text FROM nlp";
	$allMichigan = "SELECT text FROM nlp WHERE state = 'MI'";
	$voteQuery = "SELECT text FROM nlp WHERE text LIKE '%#primaries%' ";
	
	
	//function to perform the search
	query($voteQuery);
	
	
	
function query($q) {
		
	$result = mysql_query($q);
	$data = array(); //Initializing the results array

	while ($row = mysql_fetch_assoc($result)){
		array_push($data, $row);
	}
	
	$count = count($data);
	echo "<b>Found " . $count . " entries</b><br><hr>";
	
	for ($i = 0; $i < $count; $i++) {
		$set = $data[$i]['text'];
		echo $i. ") ". $set . "<br>";
	}
		
}
?>
