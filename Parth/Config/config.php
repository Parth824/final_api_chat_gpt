<?php

        class Config{
            private $SERVERNAME = "localhost";
            private $USERNAME = "root";
            private $PASSWORD = "";
            private $DATABASENAME = "demo";
            public $conn;

            public Function Connection(){
                $this->conn =  @mysqli_connect($this->SERVERNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASENAME);
                
                return $this->conn;
            }

            public Function Insert($name,$age,$coures){
                $this->Connection();

                $q = "INSERT into student(name,age,course) values('$name',$age,'$coures')";
                $res = mysqli_query($this->conn,$q);
                return $res;
            }

            public Function delete_All($id){
                $this->Connection();

                $q = "delete from student where id = $id";
                $res = mysqli_query($this->conn,$q);

                return $res;

            }

            public function update_all($id, $name,$age,$coures)
            {
                $this->Connection();

                $q = "Update student set name = '$name' ,age = $age,course = '$coures' where id = $id";
                $res = mysqli_query($this->conn,$q);
                return $res;
            }
            public Function All_Data(){
                $this->Connection();

                $q = "select * from student";
                $res = mysqli_query($this->conn,$q);
                return $res;
            }
        
        }

?>