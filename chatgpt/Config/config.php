<?php
        class Config 
        {
            private $SERVERNAME = "localhost";
            private $USERNAME = "id21277771_parth";
            private $PASSWORD = "Parth@1234";
            private $DATABASENAME = "id21277771_chatgpt";
            private $Conn;
            private $USER ="user";
            private $chat = "chat";
            private $Image = "image";


            public function Connection()
            {
                $this->Conn = mysqli_connect($this->SERVERNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASENAME);

            }

            public function InsertUser($First_Name,$Last_Name,$Email_Id,$Password)
            {
                
                $this->Connection();
                
                    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

                    $qu = "Insert into $this->USER(First_Name,Last_Name,Email_Id,Password) values('$First_Name','$Last_Name','$Email_Id','$hashed_password')";

                    $res1 = mysqli_query($this->Conn,$qu);

                    return $res1;
                
            }

            public function Insert_Message($message,$sentByme,$U_Id,$mId,$dateTime,$answer)
            {
                $this->Connection();

                $query = "Insert into $this->chat(message,sentByme,U_Id,mId,dateTime,answer) values('$message','$sentByme',$U_Id,'$mId','$dateTime','$answer')";

                $res = mysqli_query($this->Conn, $query);
                
                return $res;

            }

            public function checkUser($Email_Id)
            {
                $this->Connection();

                $query = "SELECT * FROM $this->USER WHERE Email_Id='$Email_Id';";

                $res = mysqli_query($this->Conn, $query);
                
                
                return $res;

            }

            public function AllChat($U_Id)
            {
                $this->Connection();

                $query = "SELECT * FROM $this->chat WHERE U_Id= $U_Id;";

                $res = mysqli_query($this->Conn, $query);
                
                
                return $res;

            }
            
            public function signin_user($Email_Id, $Password) {
                $this->Connection();
    
                $query = "SELECT * FROM $this->USER WHERE Email_Id='$Email_Id';";
    
                $res = mysqli_query($this->Conn, $query);  // obj of mysqli_result class
    
                $record = mysqli_fetch_assoc($res);
    
                if($record) {
    
                    // password_verify(raw_password, hashed_password);   => return bool
                    $k =[];
                    $isVerified = password_verify($Password, $record['Password']);
                    $k['isVerified'] = $isVerified;
                    $k['U_Id'] = $record['U_Id'];
                    return $k;  // true or false
    
                } else {
                    return false;
                }
            }
            public function GetUser()
            {
                $this->Connection();

                $qu = "Select * from $this->USER";

                $res = mysqli_query($this->Conn,$qu);

                return $res;
            }

            public function DeleteOne($mId)
            {
                $this->Connection();

                $qu = "delete from $this->chat where mId = $mId";

                $res = mysqli_query($this->Conn,$qu);

                return $res;
            }

            public function DeleteAll($U_Id)
            {
                $this->Connection();

                $qu = "delete from $this->chat where U_Id = $U_Id";

                $res = mysqli_query($this->Conn,$qu);

                return $res;
            }

            public function InsertImage($image,$U_Id)
            {
                $this->Connection();

                $qu = "Insert into $this->Image(Image,U_Id) values('$image',$U_Id)";

                $res = mysqli_query($this->Conn,$qu);

                return $res;
            }

            public function DeleteImageOne($i_id)
            {
                $this->Connection();

                $qu = "delete from $this->Image where I_Id = $i_id";

                $res = mysqli_query($this->Conn,$qu);

                return $res;
            }

            public function DeleteImageAll($U_Id)
            {
                $this->Connection();

                $qu = "delete from $this->Image where U_Id = $U_Id";

                $res = mysqli_query($this->Conn,$qu);

                return $res;
            }

            public function UpdateImage($i_id,$u_id,$image)
            {
                $this->Connection();

                $qu = "Update $this->Image set Image = '$image' where U_Id = $u_id and I_Id = $i_id";

                $res = mysqli_query($this->Conn,$qu);

                return $res;
            }

            public function AllImage($U_Id)
            {
                $this->Connection();

                $query = "SELECT * FROM $this->Image WHERE U_Id = $U_Id;";

                $res = mysqli_query($this->Conn, $query);
                
                
                return $res;

            }
        }

?>