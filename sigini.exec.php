<?php

session_start(); // inicial a sessao
require_once __DIR__ . "/api/cookie.php"; 
require_once __DIR__ . "/class/user.php"; 
require_once __DIR__ . "/class/person.php"; 

function login($parametros){
    if($parametros['captcha'] != $_SESSION["captcha"]){
        return json_encode( array( "error" => "O Captcha não confere." )); 
    }

    $retorno = Person::login($parametros['login'], $parametros['password']);
    if($retorno == NULL) {
        return json_encode( array( "error" => "Não foi possível logar com os valores informados." )); 
    }
    $session =  new SessionCookie();
    $session->save("user", json_encode($retorno));
    return json_encode( array( "result" => true ));
}

function increase($parametros){
    $retorno = User::get_increase($parametros['login']);
    return json_encode( array( "result" => $retorno ));
}

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    $function = new ReflectionFunction($data['method']);
    echo json_encode($function->invoke($data['parameters']));
    exit();
}

?>