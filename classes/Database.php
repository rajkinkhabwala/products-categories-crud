<?php
    class Database {
        public $conn;
        
        public function __construct() {
            $this->conn = new mysqli(SERVER,USERNAME,PASSWORD,DBNAME);

            if($this->conn->connect_error == TRUE){
                echo "There is a connection error :" . $this->conn->connect_error;
            }
        }
    }
?>