<?php
require_once __DIR__ . "/api/cookie.php"; 
require_once __DIR__ . "/class/project.php"; 


function list_projects($parameters){
    $session =  new SessionCookie();
    $session_user_id = json_decode($session->load("user"), true)['_id'];

    $projetos = Project::listAll();

    return json_encode( array( "result" => $projetos  ));
}



if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    $function = new ReflectionFunction($data['method']);
    echo json_encode($function->invoke($data['parameters']));
    exit();
}


?>