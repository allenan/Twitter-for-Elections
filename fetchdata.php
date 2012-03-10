
<?php
//
$link = mysql_connect('localhost', 'nonagon_twitter', 'Twitter321!');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('nonagon_twitter-votes',$link) or die('Cannot select the DB');
$romney = mysql_query('SELECT count(*) as count FROM `tracked` WHERE `text` like "%romney%"');
if (!$romney) {
    die('Invalid query: ' . mysql_error());
}
$santorum = mysql_query('SELECT count(*) as count FROM `tracked` WHERE `text` like "%santorm%"');
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

die(print_r($romney));






header('Content-type: application/json');
//echo json_encode(array('markers'=>$results));
?>