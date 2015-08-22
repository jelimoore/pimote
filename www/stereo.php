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
            <li><a href="/tv.php">TV</a></li>
            <li class="active"><a href="/stereo.php">Stereo</a></li>
            <li><a href="/dvd.php">DVD Player</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
     <p>
       <a class="btn btn-success" href="?command=power">Power</a>  
       <a class="btn btn-success" href="?command=volup">Volume Up</a>  
       <a class="btn btn-success" href="?command=voldown">Volume Down</a>  
       <a class="btn btn-success" href="?command=tvaud">Use TV Audio</a>  
       <a class="btn btn-success" href="?command=auxaud">Use Aux Audio</a>  
       <a class="btn btn-success" href="?command=cdaud">Listen to a CD</a>  
       <a class="btn btn-success" href="?command=eject">Eject CD</a>  
     </p>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>';

if (isset($_GET['command'])){
 switch ($_GET['command']){
  case 'power':
   exec('irsend SEND_ONCE STEREO KEY_POWER');
  break;
  case 'volup':
   exec('irsend SEND_ONCE STEREO KEY_VOLUMEUP');
  break;
  case 'voldown':
   exec('irsend SEND_ONCE STEREO KEY_VOLUMEDOWN');
  break;
  case 'tvaud':
   exec('irsend SEND_ONCE STEREO KEY_TAPE');
  break;
  case 'auxaud':
   exec('irsend SEND_ONCE STEREO KEY_AUX');
  break;
  case 'cdaud':
  	exec('irsend SEND_ONCE STEREO KEY_CD');
  break;
  case 'eject':
  	exec('irsend SEND_ONCE STEREO KEY_EJECTCD');
  break;
 }
}
echo $page;
?>
