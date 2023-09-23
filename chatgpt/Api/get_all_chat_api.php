<?php

    header("Access-Control-Allow-Methos: POST");
    header("Content-Type: appilcation/json");

    include('api.php');

    $Api = new Api();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        $Api->GetAllChat($_POST['U_Id']);
    }
    else{
        echo json_encode(['result'=>'This Methos is Not....']);
    }

?>