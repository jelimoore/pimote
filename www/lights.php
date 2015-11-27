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
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/navbar-fixed-top.css" rel="stylesheet">

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
            <li><a href="/tv.php">TV</a></li>
            <li><a href="/stereo.php">Stereo</a></li>
            <li><a href="/dvd.php">DVD Player</a></li>
            <li class="active"><a href="/lights.php">Lights</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
     <p>
      <a class="btn btn-success btn-lg btn-lg" href="?command=signon">RC Toy Sign On</a>
      <a class="btn btn-success btn-lg btn-lg" href="?command=signoff">RC Toy Sign Off</a>
      <a class="btn btn-success btn-lg btn-lg" href="?command=accenton">Accent Lights On</a>
      <a class="btn btn-success btn-lg btn-lg" href="?command=accentoff">Accent Lights Off</a>
     </p>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>';

include 'assets/scripts/functions.php';

echo $page;

$token = "b658f8321a7d4462a6b2f03d226d6632";

if (isset($_GET['command'])) {
	switch ($_GET['command']) {
		case "signoff":
			blynkWrite($token, "d", "7", "0");
		break;
		case "signon":
			blynkWrite($token, "d", "7", "1");
		break;
		case "accentoff":
			blynkWrite($token, "d", "2", "0");
		break;
		case "accenton":
			blynkWrite($token, "d", "2", "1");
		break;
	}
	
}

?>
