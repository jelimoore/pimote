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
       <a class="btn btn-success" href="?command=watchtv">Watch TV</a>
       <a class="btn btn-success" href="?command=osmc">Watch OSMC</a>  
       <a class="btn btn-success" href="?command=laptop">Display Laptop</a>  
       <a class="btn btn-success" href="?command=playps1">Play PS1</a>  
       <a class="btn btn-success" href="?command=playwii">Play Wii</a>  
     </p>
    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>';
if (isset($_GET['command'])){
 switch ($_GET['command']){
  case 'watchtv':
   exec('irsend SEND_ONCE TV KEY_POWER');
   exec('irsend SEND_ONCE STEREO KEY_POWER');
   exec('sleep 10');
   exec('irsend SEND_ONCE TV KEY_T');
   exec('irsend SEND_ONCE STEREO KEY_TAPE');
  break;
  case 'osmc':
   exec('irsend SEND_ONCE TV KEY_POWER');
   exec('irsend SEND_ONCE STEREO KEY_POWER');
   exec('sleep 10');
   exec('irsend SEND_ONCE TV KEY_C');
   exec('irsend SEND_ONCE TV KEY_H');
   exec('irsend SEND_ONCE STEREO KEY_TAPE');
  break;
  case 'laptop':
   exec('irsend SEND_ONCE TV KEY_POWER');
   exec('irsend SEND_ONCE STEREO KEY_POWER');
   exec('sleep 10');
   exec('irsend SEND_ONCE TV KEY_C');
   exec('sleep 0.5');
   exec('irsend SEND_ONCE TV KEY_H');
   exec('sleep 0.5');
   exec('irsend SEND_ONCE TV KEY_H');
   exec('irsend SEND_ONCE STEREO KEY_TAPE');
  break;
  case 'playwii':
   exec('irsend SEND_ONCE TV KEY_POWER');
   exec('irsend SEND_ONCE STEREO KEY_POWER');
   exec('sleep 10');
   exec('irsend SEND_ONCE TV KEY_C');
   exec('irsend SEND_ONCE STEREO KEY_TAPE');
  break;
  case 'playps1':
   exec('irsend SEND_ONCE TV KEY_POWER');
   exec('irsend SEND_ONCE STEREO KEY_POWER');
   exec('sleep 10');
   exec('irsend SEND_ONCE TV KEY_A');
   exec('irsend SEND_ONCE STEREO KEY_TAPE');
  break;
 }
}
echo $page;
?>
