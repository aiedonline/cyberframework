<?php

require_once __DIR__ . "/api/cookie.php"; 
require_once __DIR__ . "/class/person.php"; 
require_once __DIR__ . "/class/project.php"; 

function team($parametros){
    $projeto = Project::load($_GET['id']);

    $users = [];
    if(isset($_GET['id'])){
        $user = Person::load($projeto->person_id);
        $users = [array("name" => $user->name, "image" => $user->image, "bio" => $user->bio)];
    }
    //if($projeto->person_id != null) {
    //    
    //}
    return json_encode( array( "result" =>  $users));
}


function load($parametros){
    $projeto = Project::load($_GET['id']);
    $edit = false;

    $session =  new SessionCookie();
    if($session->exists("user")) {
        $edit = json_decode($session->load("user"), true)['_id'] == $projeto->person_id;
    }

    return json_encode( array( "result" => array("_id" => $projeto->_id, "name" => $projeto->name,
        "description" => $projeto->description, "git" => $projeto->git, "short_name" => $projeto->short_name,
        "image" => $projeto->image, "edit" => $edit) ));
}

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    $function = new ReflectionFunction($data['method']);
    echo json_encode($function->invoke($data['parameters']));
    exit();
}

?>

