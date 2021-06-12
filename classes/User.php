<?php

class User {

    private $db;
    private $conn;

    public function __construct(){
        $this->db = DbConnection::getInstance();
        $this->conn = $this->db->getConnection();
    }
	
    public function create($name, $email){

        $exists_user_id = $this->getUserByEmail($email);
        if($exists_user_id){
            return $exists_user_id['id'];
        }
 
        $query = "INSERT INTO users ( name, email, created_at) VALUES (:name, :email, CURRENT_TIMESTAMP )";
        $st = $this->conn->prepare($query);
        $st->bindParam(":name", $name, \PDO::PARAM_STR);
        $st->bindParam(":email", $email, \PDO::PARAM_STR);
        $st->execute();
        return $this->conn->lastInsertId();
    }

    private function getUserByEmail($email){
        $query = "SELECT id FROM users WHERE email = :email";

        $res = $this->conn->prepare($query);
        $res->bindParam(':email', $email, \PDO::PARAM_STR);
        $res->execute();
        return $res->rowCount() > 0 ? $res->fetch(\PDO::FETCH_ASSOC) : false;
        
    }

}