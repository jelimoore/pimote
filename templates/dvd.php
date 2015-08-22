<?php
$page='
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Whole Home Remote</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
     <p>
      <a class="btn btn-success" href="?command=power">Power</a>
      <a class="btn btn-success" href="?command=up">Up</a>
      <a class="btn btn-success" href="?command=down">Down</a>
      <a class="btn btn-success" href="?command=left">Left</a>
      <a class="btn btn-success" href="?command=right">Right</a>
      <a class="btn btn-success" href="?command=select">Select</a>
      <a class="btn btn-success" href="?command=playpause">Play/Pause</a>
      <a class="btn btn-success" href="?command=menu">Menu</a>
      <a class="btn btn-success" href="?command=stop">Stop</a>
     </p>
    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>';
if (isset($_GET['command'])){
 switch ($_GET['command']){
  case 'power':
   exec('irsend SEND_ONCE DVD KEY_POWER');
  break;
  case 'up':
   exec('irsend SEND_ONCE DVD KEY_UP');
  break;
  case 'down':
   exec('irsend SEND_ONCE DVD KEY_DOWN');
  break;
  case 'left':
   exec('irsend SEND_ONCE DVD KEY_LEFT');
  break;
  case 'right':
   exec('irsend SEND_ONCE DVD KEY_RIGHT');
  break;
  case 'playpause':
   exec('irsend SEND_ONCE DVD KEY_PLAYPAUSE');
  break;
  case 'menu':
   exec('irsend SEND_ONCE DVD KEY_MENU');
  break;
  case 'stop':
   exec('irsend SEND_ONCE DVD KEY_STOP');
  break;
 }
}
echo $page;
?>
