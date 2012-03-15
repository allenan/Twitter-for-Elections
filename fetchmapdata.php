<?php


/* connect to the db */
$link = mysql_connect('localhost','nonagon_twitter','Twitter321!') or die('Cannot connect to the DB');
mysql_select_db('nonagon_twitter-votes',$link) or die('Cannot select the DB');

// Get event codes from given classes


$query = 'SELECT * FROM geotagged where
    text like "%gop%" or 
    text like "%primary%" or
    text like "%primaries%" or
    text like "%ron paul%" or
    text like "%ronpaul%" or
    text like "%gingrich%" or
    text like "%newt%" or
    text like "%romney%" or
    text like "%santorum%"
    limit 5000;';

$result = mysql_query($query,$link) or die('Errant query:  '.$query);
$results = array();
if(mysql_num_rows($result)) {
    while($r = mysql_fetch_assoc($result)) {
        $results[] = $r;
    }
}


header('Content-type: application/json');

echo json_encode(array('markers'=>$results));

?>