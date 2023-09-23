<?php

    header("Content-Type: appilcation/json");
    header("Access-Control-Allow-Methods: GET");
    $request_method  = $_SERVER["REQUEST_METHOD"];

    include("api.php");

    $a = new Api();
    
    if($request_method == "GET")
    {
       $res = $a->getdata();

       echo $res;

    }
    else{
        $res=  [
            'status' 
             406,
            'message'=>$request_method.'Method Not Allowed'
        ];
        echo json_encode($res);
    } 
?>