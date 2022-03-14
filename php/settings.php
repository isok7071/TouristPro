<?php
    //Класс по подключению к базе данных
    class dbConnect
    {   
        public $mysqli;
        public $hostname='localhost';
        public $username='root';
        public $password = '';
        public $dbName ='touristpro';

        function __construct()
         {  
            $this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
         }
         //закрывает соединение с базой данных
        function closeDb(){
            $this->mysqli->close();
        }
    }

    
?> 
