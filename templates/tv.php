<?php
$page='
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <a class="btn btn-success" href="?command=volup">Volume Up</a>
      <a class="btn btn-success" href="?command=voldown">Volume Down</a>
      <a class="btn btn-success" href="?command=mute">Mute</a>
      <a class="btn btn-success" href="?command=input">Input</a>
      <a class="btn btn-success" href="?command=tv">TV</a>
      <a class="btn btn-success" href="?command=av">AV</a>
      <a class="btn btn-success" href="?command=comp">Component</a>
      <a class="btn btn-success" href="?command=hdmi">HDMI</a>
     </p>
    </div> <!-- /container -->
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
 }
}
echo $page;
?>
