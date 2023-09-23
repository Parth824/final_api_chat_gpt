<?php

    include('../Config/config.php');
    
    class Api{

     public Function getdata(){
        $config = new Config();
        $res = $config->All_Data();
        $k = [];
        if($res)
        {
         if(mysqli_num_rows($res)>0)
         {
             $output = mysqli_fetch_all($res,MYSQLI_ASSOC);
             return json_encode($output);
         }
         else{
             $data =[
                 'status'=>404,
                 'message'=>'No Customer Found',
             ];
             return json_encode($data);
         }
        }else{
          $data =[
             'status'=>500,
             'message'=>'Internal Server Error',
          ];
          return json_encode($data);
        }
        }
    }

?>

