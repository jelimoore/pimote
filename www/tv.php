<?php
$page='
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Whole Home Remote</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Remote</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li class="active"><a href="/tv.php">TV</a></li>
            <li><a href="/stereo.php">Stereo</a></li>
            <li><a href="/dvd.php">DVD Player</a></li>
            <li><a href="/lights.php">Lights</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
     <p>
      <a class="btn btn-success" href="?command=KEY_POWER">Power</a>
      <a class="btn btn-success" href="?command=KEY_VOLUMEUP">Volume Up</a>
      <a class="btn btn-success" href="?command=KEY_VOLUMEDOWN">Volume Down</a>
      <a class="btn btn-success" href="?command=KEY_MUTE">Mute</a>
      <a class="btn btn-success" href="?command=KEY_LAST">Last</a>
      <a class="btn btn-success" href="?command=KEY_CHANNELUP">Channel Up</a>
      <a class="btn btn-success" href="?command=KEY_CHANNELDOWN">Channel Down</a>
      <a class="btn btn-success" href="?command=KEY_I">Input</a>
      <a class="btn btn-success" href="?command=KEY_T">TV</a>
      <a class="btn btn-success" href="?command=KEY_A">AV</a>
      <a class="btn btn-success" href="?command=KEY_C">Component</a>
      <a class="btn btn-success" href="?command=KEY_H">HDMI</a>
      <a class="btn btn-success" href="?command=KEY_1">1</a>
      <a class="btn btn-success" href="?command=KEY_2">2</a>
      <a class="btn btn-success" href="?command=KEY_3">3</a>
      <a class="btn btn-success" href="?command=KEY_4">4</a>
      <a class="btn btn-success" href="?command=KEY_5">5</a>
      <a class="btn btn-success" href="?command=KEY_6">6</a>
      <a class="btn btn-success" href="?command=KEY_7">7</a>
      <a class="btn btn-success" href="?command=KEY_8">8</a>
      <a class="btn btn-success" href="?command=KEY_9">9</a>
      <a class="btn btn-success" href="?command=KEY_0">0</a>
      <a class="btn btn-success" href="?command=KEY_MINUS">-</a>
      <a class="btn btn-success" href="?command=KEY_INFO">Info</a>
     </p>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>';

include 'functions.php';

if (isset($_GET['command'])){
 irsend("TV", $_GET['command']);
}
echo $page;
?>
