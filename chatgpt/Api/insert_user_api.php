<?php

    header("Access-Control-Allow-Methos: POST");
    header("Content-Type: appilcation/json");

    include('api.php');

    $Api = new Api();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $Api->regUser($_POST['First_Name'],$_POST['Last_Name'],$_POST['Email_Id'],$_POST['Password']);
    }
    else{
        echo json_encode(['result'=>'This Methos is Not....']);
    }

?>