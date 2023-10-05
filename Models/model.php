<?php

require_once 'config.php';
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = DB_HOST;
        $this->db       = DB_NAME;
        $this->user     = DB_USER;
        $this->charset  = DB_Charset;
    }

    function connect(){
    
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            
            $pdo = new PDO($connection, $this->user, $this->password);
    
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
   
}