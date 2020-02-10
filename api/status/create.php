<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Header: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Method, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Status.php';

    $database = new Database();
    $db = $database->connect();

    $data = json_decode(file_get_contents("php://input"));
    
    $status = new Status($db);
    $status->id = $data->id;
    $status->status_name = $data->status_name;

    $result = $status->create();
?>