<?php

    class Config
    {
        private $LOCATHOSt = "localhost";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DATABASENAME = "user";
        private $CONN;


        public function Connction()
        {
            $this->CONN = @  mysqli_connect($this->LOCATHOSt,$this->USERNAME,$this->PASSWORD,$this->DATABASENAME);
            return $this->CONN;
        }

        public function CreatTbale()
        {
            $this->Connction();
            $qure = "CREATE TABLE IF NOT EXISTS Emp (e_id int  PRIMARY KEY AUTO_INCREMENT,name text ,salary int)";
            $res = mysqli_query($this->CONN,$qure);
            return $res;
        }

        public function InserData($name,$salaer)
        {
            $this->Connction();
            $qure = "Insert into Emp(name,salary) values('$name',$salaer)";
            $res = mysqli_query($this->CONN,$qure);
            return $res;
        }
        public function update($id,$name,$salaer)
        {
            $this->Connction();
            $qure = "update Emp set name = '$name',salary= $salaer where e_id = $id";
            $res = mysqli_query($this->CONN,$qure);
            return $res;
        }
        public function SelectData()
        {
            $this->Connction();
            $qure = "Select * from Emp";
            $res = mysqli_query($this->CONN,$qure);
            return $res;
        }

        public function SelectDataall($res)
        {
            $this->Connction();
            $qure = "Select * from Emp where name like '%$res%' or salary like '%$res%'";
            $res = mysqli_query($this->CONN,$qure);
            return $res;
        }
        public function SelectDataone($id)
        {
            $this->Connction();
            $qure = "Select * from Emp where e_id = $id";
            $res = mysqli_query($this->CONN,$qure);
            return $res;
        }
    }
?>