<?php
    header("Access-Control-Allow-Methos: GET");
    header("Content-Type: appilcation/json");

    include('api.php');

    $Api = new Api();

    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $Api->GetAllUser();
    }
    else{
        echo json_encode(['result'=>'This Methos is Not....']);
    }

?> 
