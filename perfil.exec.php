<?php
require_once __DIR__ . "/api/cookie.php"; 
require_once __DIR__ . "/class/person.php"; 

function load($parametros){
    //$session =  new SessionCookie();
    //return json_encode( array( "result" => json_decode($session->load("user"), true) ));
    $session =  new SessionCookie();
    $person = Person::load(json_decode($session->load("user"), true)['_id']);
    $result = array("_id" => $person->_id, "name" => $person->name, "contact" => $person->contact,
            "bio" => $person->bio, "image" => $person->image, "username" => $person->user()->login );
    return json_encode( array( "result" => $result ));
}

function save($parametros){
    $session =  new SessionCookie();
    $person = Person::load(json_decode($session->load("user"), true)['_id']);

    $person->name = $parametros['name'];
    $person->contact = $parametros['contact'];
    $person->bio = $parametros['bio'];
    $person->image = $parametros['image'];

    $session->save("user", json_encode($person));

    return json_encode( array( "result" => $person->save() ));
}

function increase($parametros){
    $session =  new SessionCookie();
    $person = Person::load(json_decode($session->load("user"), true)['_id']);
    return json_encode( array( "result" => $person->user()->increase ));
}

function change($parametros){
    $session =  new SessionCookie();
    $person = Person::load(json_decode($session->load("user"), true)['_id']);
    return json_encode( array( "result" => $person->user()->change($parametros['password']) ));
}

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    $function = new ReflectionFunction($data['method']);
    echo json_encode($function->invoke($data['parameters']));
    exit();
}


?>