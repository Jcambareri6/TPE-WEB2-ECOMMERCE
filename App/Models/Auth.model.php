<?php 
require_once'./app/models/model.php';
class UserModel extends DB {

    public function getByEmail($username) {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = ?');
        $query->execute([$username]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
