<?php
	//https://stackoverflow.com/questions/2115302/ckeditor-image-upload-filebrowseruploadurl

 	//move_uploaded_file($_FILES["upload"]["tmp_name"], "images/" . $_FILES["upload"]["name"]);
	require dirname(__DIR__, 1)  . '/api/utilitario.php';
	$imageFolder = dirname(__DIR__, 1) . "/uploads/";

	reset($_FILES);
	$temp = current($_FILES);
	$new_name = guid() . "." . pathinfo($temp['name'], PATHINFO_EXTENSION);
    $filetowrite = $imageFolder . $new_name;
    move_uploaded_file($temp['tmp_name'], $filetowrite);
	echo json_encode(array('uploaded' => 1, 'fileName' =>  $new_name,  'url' => "/secanalysis/uploads/" . $new_name ));

?>