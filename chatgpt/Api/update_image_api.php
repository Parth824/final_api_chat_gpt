<?php

    header("Access-Control-Allow-Methods: POST,GET");
    header("Content-Type: appilcation/json");

    
    include('api.php');

    $api = new Api();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $image = $_FILES['image'];
        $u_id = $_POST['U_Id'];
        $i_id = $POSt['I_Id'];
        

        $fillename = $image['name'];
        $temp_path = $image['tmp_name'];

        $uid = uniqid();
    

        
        $image_name = $uid . "-". $fillename;
        $dec_path = "../uploads/" . $image_name;
    

        $isfile =  move_uploaded_file($temp_path,$dec_path);
        
        $api->UpdateIMageData($i_id,$u_id,$image_name);
       
    }
    else{
        echo json_encode(['result'=>'This Method Not....']);
    }

?>