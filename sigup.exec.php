<?php

session_start(); // inicial a sessao
require_once __DIR__ . "/class/person.php"; 

function exists($parametros){
    return json_encode(array("result" => Person::exists_login( $parametros['login']  )));
}


function register($parametros){

    if($parametros['captcha'] != $_SESSION["captcha"]){
        return json_encode( array( "error" => "O Captcha não confere." )); 
    }

    
    if(trim($parametros['increase']) == ""){
        return json_encode(array("error" => "Token de incremento inválido."));
    }

    $retorno = Person::register($parametros['login'], $parametros['name'], "", $parametros['password'], $parametros['increase']);
    return json_encode( array( "result" => true ));
}


if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    $function = new ReflectionFunction($data['method']);
    echo json_encode($function->invoke($data['parameters']));
    exit();
}

?>