<?php
error_reporting(E_ALL);

require_once dirname(__DIR__)  . '/api/utilitario.php';
//require_once dirname(__FILE__, 2)  . '/engine/api/mysql.php';
//require_once dirname(__FILE__, 2)  . '/engine/api/user.php';
//$user = json_decode( session_load('user_cookie') );

//error_log(dirname(__DIR__) , 0);
// 0 : Sem erro
// 1, 2, 3, ... ERRO.

error_log(json_encode($_FILES), 0);
if ( 0 < $_FILES['file']['error'] ) {
    //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    echo Utilitario::SaidaPadrao(false, "Não foi possível salvar arquivo. " . $_FILES['file']['error'], [ ]);
}
else {
    $g = guid();
    $ext = pathinfo(current($_FILES)['name'], PATHINFO_EXTENSION);
    $name = $g . "." . $ext;
    $path_upload = dirname(__DIR__) . "/upload/" . $name; //. "/tmp/" . $name;
    $moved =  move_uploaded_file(current($_FILES)['tmp_name'], $path_upload );
    if ( $moved  ){
        echo Utilitario::SaidaPadrao(true, array('name'=>$name), [ ]);
    } else {
        echo Utilitario::SaidaPadrao(false, "Não foi possível salvar arquivo. " .$_FILES["file"]["error"], [ ]);
    }
}


?>