<meta charset="utf-8">
  <title>Cyberframework.online</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Your page description here" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="/cyber/css/bootstrap.css" rel="stylesheet" />
  <link href="/cyber/css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="/cyber/css/flexslider.css" rel="stylesheet" />
  <link href="/cyber/css/prettyPhoto.css" rel="stylesheet" />
  <link href="/cyber/css/camera.css" rel="stylesheet" />
  <link href="/cyber/css/jquery.bxslider.css" rel="stylesheet" />
  <link href="/cyber/css/style.css" rel="stylesheet" />

  <!-- Theme skin -->
  <link href="/cyber/color/default.css" rel="stylesheet" />

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="/cyber/favicon.png" />

<?php
require_once __DIR__ . "/api/cookie.php";
$cookie = new SessionCookie();
// CARREGAMENTO EM GERAL
$SITE = 'cyber';
$USER = null;
$importados = [];
echo '<script> var PREFIX = "/' . $SITE . '/";</script>';

if($cookie->exists("user")){
  $USER = json_decode($cookie->load("user"));
}

function importar_js($path){
  global $SITE;
  global $importados;
  if(in_array($path, $importados)){
    return;
  }
  array_push($importados, $path);
    $filename =  $_SERVER['DOCUMENT_ROOT'] . "/" . $SITE . "/"  . $path . ".js";
    if(file_exists($filename)) {
        echo('<script src="/' . $SITE . "/" . $path . '.js?id=' . hash_file('md5', $filename) . '"></script>');
    }
}

?>