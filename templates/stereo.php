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
       <a class="btn btn-success" href="?command=volup">Volume Up</a>  
       <a class="btn btn-success" href="?command=voldown">Volume Down</a>  
       <a class="btn btn-success" href="?command=tvaud">Use TV Audio</a>  
       <a class="btn btn-success" href="?command=auxaud">Use Aux Audio</a>  
       <a class="btn btn-success" href="?command=cdaud">Listen to a CD</a>  
       <a class="btn btn-success" href="?command=eject">Eject CD</a>  
     </p>
    </div> <!-- /container -->
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
