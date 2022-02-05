<?php


require_once __DIR__ . "/class/person.php"; 

function send($parametros){
    if(trim($parametros['email']) == ""){
        return json_encode(array("error" => "Email inválido."));
    }
    //$retorno = Person::register($parametros['login'], $parametros['name'], "", $parametros['password'], $parametros['increase']);
    return json_encode( array( "result" => true ));
}


if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    $function = new ReflectionFunction($data['method']);
    echo json_encode($function->invoke($data['parameters']));
    exit();
}

?>