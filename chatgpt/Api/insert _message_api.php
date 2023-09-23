<?php

    header("Access-Control-Allow-Methos: POST");
    header("Content-Type: appilcation/json");

    include('api.php');

    $Api = new Api();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        $Api->InsertMessage($_POST['message'],$_POST['sentByme'],$_POST['U_Id'],$_POST['mId'],$_POST['dateTime'],$_POST['answer']);
    }
    else{
        echo json_encode(['result'=>'This Methos is Not....']);
    }

?>