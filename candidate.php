<?php

//$candidate = "Romney";
$candidate = $_GET['candidate'];

$link = mysql_connect('localhost', 'nonagon_twitter', 'Twitter321!');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('nonagon_twitter-votes',$link) or die('Cannot select the DB');

$query = mysql_query('SELECT * FROM `nlp2` WHERE text LIKE "%' . $candidate. '%" LIMIT 30');
if (!$query) {
    die('Invalid query: ' . mysql_error());
}

$data = array();
if(mysql_num_rows($query)) {
    while($r = mysql_fetch_assoc($query)) {
        array_push($data, $r);
	//$data[0] = $r;
    }
}
//die(print_r($data));
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Super Tuesday-Problems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="http://twitter.github.com/bootstrap/examples/images/favicon.ico">
    <link rel="apple-touch-icon" href="http://twitter.github.com/bootstrap/examples/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="http://twitter.github.com/bootstrap/examples/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="http://twitter.github.com/bootstrap/examples/images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="twittervotes.php">Super Tuesday</a>
            <div class="nav-collapse">
              <ul class="nav">
                <li><a href="twittervotes.php">Voter Reports</a></li>
                <li class="active"><a href="problem-reports.php">Problem Reports</a></li>
                <li><a href="map-reports.html">Map</a></li>
              </ul>
            </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <!-- Search Bar / Results Bar -->          
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Tweets by Candidate</li>
              <li><a href="candidate.php?candidate=Ron Paul" onclick="">Ron Paul</a></li>
              <li><a href="candidate.php?candidate=Romney" onclick="">Mitt Romney</a></li>
              <li><a href="candidate.php?candidate=Gingrich" onclick="">Newt Gingrich</a></li>
              <li><a href="candidate.php?candidate=Santorum" onclick="">Rick Santorum</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div>
            <h1 style="text-align:center">Tweets for <?php echo $candidate ?></h1><br/>
          </div>
          <div class="well">
            <?php foreach ($data as $tweet): ?>
              <div class="row-fluid" name="voter_reports">
                <div class="span2">
                  <img class="thumbnail" src="http://placehold.it/60x60">
                </div>
                <div class="span10">
                  <h5><?php echo $tweet['user'] ?></h5>
                  <h6><?php echo $tweet['date'] ?></h6>
                  <p><?php echo $tweet['text'] ?></p>
                </div>
              </div><!--/row-->
              <hr/>
            <?php endforeach; ?>
        </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      
    </div><!--/.fluid-container-->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


  

</body></html>



?>
