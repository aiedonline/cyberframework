<?php
require_once __DIR__ . "/api/cookie.php"; 
require_once __DIR__ . "/class/person.php"; 
require_once __DIR__ . "/class/project.php"; 

function load($parametros){
    $session =  new SessionCookie();
    $session_user_id = json_decode($session->load("user"), true)['_id'];

    $projeto = Project::load($_GET['id']);
    if($projeto->person_id != json_decode($session->load("user"), true)['_id']){
        //todo: fuder um cara mal carater
        die();
    }

    return json_encode( array( "result" => array("_id" => $projeto->_id, "name" => $projeto->name,
        "description" => $projeto->description, "git" => $projeto->git, "short_name" => $projeto->short_name,
        "image" => $projeto->image) ));
}

function team($parametros){
    $projeto = Project::load($_GET['id']);

    $users = [];
    if(isset($_GET['id'])){
        $user = Person::load($projeto->person_id);
        $users = [array("name" => $user->name, "image" => "", "bio" => $user->bio)];
    }
    //if($projeto->person_id != null) {
    //    
    //}
    return json_encode( array( "result" =>  $users));
}



function save($parametros){
    $session =  new SessionCookie();
    $projeto = null;
    if(isset( $_GET['id'] )){
        $projeto = Project::load($_GET['id']);
        if($projeto->person_id != json_decode($session->load("user"), true)['_id']){
            //todo: fuder um cara mal carater
            die();
        }
    } else {
        $projeto = new Project();
        $projeto->person_id = json_decode($session->load("user"), true)['_id'];
    }
    $projeto->name = $parametros['name'];
    $projeto->description = $parametros['description'];
    $projeto->image =  $parametros['image'];
    $projeto->git = $parametros['git'];
    $projeto->short_name = $parametros['short_name'];

    return json_encode( array( "result" => $projeto->save() ));
}

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    $function = new ReflectionFunction($data['method']);
    echo json_encode($function->invoke($data['parameters']));
    exit();
}


?>