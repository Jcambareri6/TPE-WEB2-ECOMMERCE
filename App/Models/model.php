<?php

require_once './Models/config.php';
class DB{
   
    private $db;

      public function __construct(){
        $this->db= new PDO("mysql:host=". DB_HOST . ";dbname=". DB_NAME .";charset=" .DB_Charset,DB_USER, DB_PASS );
     
    }

}