<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Author.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate quote object
$author = new Author($db);

$data = json_decode(file_get_contents("php://input"));

$author->author = $data->author;

if($author->create()){
    echo json_encode(
        array('message'=>'Author added')
    );
} else {
    echo json_encode(
        array('message'=> 'Author not added')
    );
}

//all functions tested and functioning