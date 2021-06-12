<?php

class DbConnection {

    private $connection;
    private static $_instance;

    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "root";
    private $dbname = "intermedia";

    private function __construct() {
        
        try{
            $this->connection = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Failed to connect to DB: ". $e->getMessage());
        }
    }

    private function __clone(){}

    public static function getInstance(){
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function getConnection(){
        return $this->connection;
    }
}