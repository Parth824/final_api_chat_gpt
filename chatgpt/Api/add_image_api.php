<?php

    header("Access-Control-Allow-Methods: POST,GET");
    header("Content-Type: appilcation/json");

    
    include('api.php');

    $api = new Api();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $image = $_FILES['image'];
        $u_id = $_POST['U_Id'];
        

        $fillename = $image['name'];
        $temp_path = $image['tmp_name'];

        $uid = uniqid();
    

        
        $image_name = $uid . "-". $fillename;
        $dec_path = "../uploads/" . $image_name;
    

        $isfile =  move_uploaded_file($temp_path,$dec_path);
        
        $api->ImageInsert($image_name,$u_id);
       
    }
    else{
        echo json_encode(['result'=>'This Method Not....']);
    }

?>