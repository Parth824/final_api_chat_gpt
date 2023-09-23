<?php
    include('../Config/config.php');
        class Api
        {
           public function regUser($First_Name,$Last_Name,$Email_Id,$Password)
           {
                $Config = new Config();
                $res1 = $Config->checkUser($Email_Id); 
                
                if(mysqli_num_rows($res1)>0)
                {
                    echo json_encode(['result'=>'Have User']);
                }
                else{
                    $res = $Config->InsertUser($First_Name,$Last_Name,$Email_Id,$Password);

                    if($res)
                    {
                        echo json_encode(['result'=>'Insert Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Insert']);
                    }
                }
           }
           public function InsertMessage($message,$sentByme,$U_Id,$mId,$dateTime,$answer)
           {
                $Config = new Config();
                
                
                    $res = $Config->Insert_Message($message,$sentByme,$U_Id,$mId,$dateTime,$answer);

                    if($res)
                    {
                        echo json_encode(['result'=>'Insert Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Insert']);
                    }
                
           }

           public function MessageDelteone($mId)
           {
                $Config = new Config();
                
                
                    $res = $Config->DeleteOne($mId);

                    if($res)
                    {
                        echo json_encode(['result'=>'Delete Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Delete']);
                    }
                
           }

           public function MessageDelteAll($U_Id)
           {
                $Config = new Config();
                
                
                    $res = $Config->DeleteAll($U_Id);

                    if($res)
                    {
                        echo json_encode(['result'=>'Delete Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Delete']);
                    }
                
           }

           public function singin_to_user($Email_Id,$Password)
           {
                $Config = new Config();

                $res = $Config->signin_user($Email_Id,$Password);

                if($res['isVerified']) {
                    $arr['data'] = 'Sign in successfully...';
                    $arr['signin_status'] = true;
                    $arr['U_Id'] = $res['U_Id'];
                    echo json_encode($arr);
                } else {
                    $arr['data'] = 'Sign in failed...';
                    $arr['signin_status'] = false;
                    echo json_encode($arr);
                }
            
           }

           

           public function GetAllUser()
           {
                $Config = new Config();
                $res = $Config->GetUser();

                $arry =[];
                if($res)
                {
                    while($data = mysqli_fetch_assoc($res))
                    {
                         array_push($arry,$data);
                    }
                    echo json_encode($arry);
                }
                else
                {
                    echo json_encode(['result' => 'selection failed']);
                }
           }

           public function GetAllChat($U_Id)
           {
                $Config = new Config();
                $res = $Config->AllChat($U_Id);

                $arry =[];
                if($res)
                {
                    while($data = mysqli_fetch_assoc($res))
                    {
                         array_push($arry,$data);
                    }
                    echo json_encode($arry);
                }
                else
                {
                    echo json_encode(['result' => 'selection failed']);
                }
           }

           public function GetAllImage($U_Id)
           {
                $Config = new Config();
                $res = $Config->AllImage($U_Id);

                $arry =[];
                if($res)
                {
                    while($data = mysqli_fetch_assoc($res))
                    {
                         array_push($arry,$data);
                    }
                    echo json_encode($arry);
                }
                else
                {
                    echo json_encode(['result' => 'selection failed']);
                }
           }

           public function ImageInsert($image,$u_id)
           {
                $Config = new Config();
                
                
                    $res = $Config->InsertImage($image,$u_id);

                    if($res)
                    {
                        echo json_encode(['result'=>'Insert Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Insert']);
                    }
                
           }

           public function ImageDeleteone($I_Id)
           {
                $Config = new Config();
                
                
                    $res = $Config->DeleteImageOne($I_Id);

                    if($res)
                    {
                        echo json_encode(['result'=>'Delete Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Delete']);
                    }
                
           }

           public function ImageDelteAll($U_Id)
           {
                $Config = new Config();
                
                
                    $res = $Config->DeleteImageAll($U_Id);

                    if($res)
                    {
                        echo json_encode(['result'=>'Delete Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Delete']);
                    }
                
           }

           

           public function UpdateIMageData($i_id,$u_id,$image)
           {
                $Config = new Config();
                
                
                    $res = $Config->UpdateImage($i_id,$u_id,$image);

                    if($res)
                    {
                        echo json_encode(['result'=>'Update Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Update']);
                    }
                
           }

        }
?>