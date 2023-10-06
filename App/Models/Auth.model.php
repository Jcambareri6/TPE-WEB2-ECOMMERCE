<?php 
require_once './App/Models/model.php';
class UserModel extends DB {
    private $db;

    function __construct() {
        $this->db = new DB();
        
    }

    public function getByEmail($email) {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
