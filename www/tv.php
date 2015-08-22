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
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
     <p>
      <a class="btn btn-success" href="?command=power">Power</a>
      <a class="btn btn-success" href="?command=volup">Volume Up</a>
      <a class="btn btn-success" href="?command=voldown">Volume Down</a>
      <a class="btn btn-success" href="?command=mute">Mute</a>
      <a class="btn btn-success" href="?command=last">Last</a>
      <a class="btn btn-success" href="?command=chup">Channel Up</a>
      <a class="btn btn-success" href="?command=chdown">Channel Down</a>
      <a class="btn btn-success" href="?command=input">Input</a>
      <a class="btn btn-success" href="?command=tv">TV</a>
      <a class="btn btn-success" href="?command=av">AV</a>
      <a class="btn btn-success" href="?command=comp">Component</a>
      <a class="btn btn-success" href="?command=hdmi">HDMI</a>
      <a class="btn btn-success" href="?command=1">1</a>
      <a class="btn btn-success" href="?command=2">2</a>
      <a class="btn btn-success" href="?command=3">3</a>
      <a class="btn btn-success" href="?command=4">4</a>
      <a class="btn btn-success" href="?command=5">5</a>
      <a class="btn btn-success" href="?command=6">6</a>
      <a class="btn btn-success" href="?command=7">7</a>
      <a class="btn btn-success" href="?command=8">8</a>
      <a class="btn btn-success" href="?command=9">9</a>
      <a class="btn btn-success" href="?command=0">0</a>
      <a class="btn btn-success" href="?command=minus">-</a>
      <a class="btn btn-success" href="?command=info">Info</a>
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
   exec('irsend SEND_ONCE TV KEY_POWER');
  break;
  case 'volup':
   exec('irsend SEND_ONCE TV KEY_VOLUMEUP');
  break;
  case 'voldown':
   exec('irsend SEND_ONCE TV KEY_VOLUMEDOWN');
  break;
  case 'last':
   exec('irsend SEND_ONCE TV KEY_LAST');
  break;
  case 'mute':
   exec('irsend SEND_ONCE TV KEY_MUTE');
  break;
  case 'chdown':
  	exec('irsend SEND_ONCE TV KEY_CHANNELDOWN');
  break;
  case 'chup':
  	exec('irsend SEND_ONCE TV KEY_CHANNELUP');
  break;
  case '1':
   exec('irsend SEND_ONCE TV KEY_1');
  break;
  case '2':
   exec('irsend SEND_ONCE TV KEY_2');
  break;
  case '3':
   exec('irsend SEND_ONCE TV KEY_3');
  break;
  case '4':
   exec('irsend SEND_ONCE TV KEY_4');
  break;
  case '5':
   exec('irsend SEND_ONCE TV KEY_5');
  break;
  case '6':
  	exec('irsend SEND_ONCE TV KEY_6');
  break;
  case '7':
  	exec('irsend SEND_ONCE TV KEY_7');
  break;
  case '8':
   exec('irsend SEND_ONCE TV KEY_8');
  break;
  case '9':
   exec('irsend SEND_ONCE TV KEY_9');
  break;
  case '0':
   exec('irsend SEND_ONCE TV KEY_0');
  break;
  case 'minus':
   exec('irsend SEND_ONCE TV KEY_MINUS');
  break;
  case 'mute':
   exec('irsend SEND_ONCE TV KEY_MUTE');
  break;
  case 'input':
  	exec('irsend SEND_ONCE TV KEY_INPUT');
  break;
  case 'tv':
  	exec('irsend SEND_ONCE TV KEY_T');
  break;
  case 'av':
   exec('irsend SEND_ONCE TV KEY_A');
  break;
  case 'comp':
   exec('irsend SEND_ONCE TV KEY_C');
  break;
  case 'hdmi':
   exec('irsend SEND_ONCE TV KEY_H');
  break;
  case 'info':
   exec('irsend SEND_ONCE TV KEY_I');
  break;
 }
}
echo $page;
?>
