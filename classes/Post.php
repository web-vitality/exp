<?php

class Post  {

    private $db;
    private $conn;

    public function __construct(){
        $this->db = DbConnection::getInstance();
        $this->conn = $this->db->getConnection();
    }
	

	 public function create($user_id, $title, $body){

        $query = "INSERT INTO posts ( user_id, title, body, created_at ) VALUES (:user, :title, :body, CURRENT_TIMESTAMP )";
        $res = $this->conn->prepare($query);
        $res->bindParam(":user", $user_id, \PDO::PARAM_INT);
        $res->bindParam(":title", $title, \PDO::PARAM_STR);
        $res->bindParam(":body", $body, \PDO::PARAM_STR);

        try {
            if ($res->execute()) {
                return $this->conn->lastInsertId();
            }
        } catch (\Exception $e) {}
        return 0;

    } 

    public function searchByUserId($user_id){

        $query = "SELECT * FROM posts WHERE user_id = :user_id";
        $res = $this->conn->prepare($query);
        $res->bindParam(":user_id", $user_id, \PDO::PARAM_INT);
        $res->execute();
        return $res->fetchAll(\PDO::FETCH_ASSOC);
       
    }


    public function searchById($post_id){

        $query = "SELECT * FROM posts WHERE id = :id";
        $res = $this->conn->prepare($query);
        $res->bindParam(":id", $post_id, \PDO::PARAM_INT);
        $res->execute();
        return $res->fetch(\PDO::FETCH_ASSOC);

    }

    public function searchByContent($string){

        $query = "SELECT *  FROM `posts` WHERE `title` LIKE '%:search%' OR `body` LIKE '%:search%'";
        $res = $this->conn->prepare($query);
        $res->bindParam(":search", $string, \PDO::PARAM_STR);
        $res->execute();
        return $res->fetchAll(\PDO::FETCH_ASSOC);

    }

}