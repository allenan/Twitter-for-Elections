<?php
header('Content-type: application/json');
$link = mysql_connect('localhost', 'nonagon_twitter', 'Twitter321!');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('nonagon_twitter-votes',$link) or die('Cannot select the DB');
$romney = mysql_query('SELECT count(*) as count FROM `tracked` WHERE `text` like "%romney%"');
if (!$romney) {
    die('Invalid query: ' . mysql_error());
}
$santorum = mysql_query('SELECT count(*) as count FROM `tracked` WHERE `text` like "%santorum%"');
if (!$santorum) {
    die('Invalid query: ' . mysql_error());
}
$gingrich = mysql_query('SELECT count(*) as count FROM `tracked` WHERE `text` like "%gingrich%"');
if (!$gingrich) {
    die('Invalid query: ' . mysql_error());
}
$paul = mysql_query('SELECT count(*) as count FROM `tracked` WHERE `text` like "%ron paul%"');
if (!$paul) {
    die('Invalid query: ' . mysql_error());
}
$data = array();
if(mysql_num_rows($romney)) {
    while($r = mysql_fetch_assoc($romney)) {
       	 $data[0]['name'] = 'romney';
	 $data[0]['count'] = $r['count'];
    }
}
if(mysql_num_rows($santorum)) {
    while($r = mysql_fetch_assoc($santorum)) {
         $data[1]['name'] = 'santorum';
         $data[1]['count'] = $r['count'];
    }
}
if(mysql_num_rows($gingrich)) {
    while($r = mysql_fetch_assoc($gingrich)) {
         $data[2]['name'] = 'gingrich';
         $data[2]['count'] = $r['count'];
    }
}
if(mysql_num_rows($paul)) {
    while($r = mysql_fetch_assoc($paul)) {
         $data[3]['name'] = 'paul';
         $data[3]['count'] = $r['count'];
    }
}

echo json_encode(array('results'=>$data));
?>
