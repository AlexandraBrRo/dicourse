<?php
//class QueryBuilder{
//    private $db;
//    public function __construct(\DiStudy\Interfaces\ConnectionInterface $connection){
//
//        $this->db = $connection;
//
//    }
//
//    public function select($tableName){
//        $statement = $this->db->query("SELECT * FROM $tableName");
//        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//        return $result;
//    }
//    public function get(){
//
//    }
//}

//$connection = new Connection();


//$dbConnect = new PDO("mysql:host=localhost;dbname=dicourse", 'root', '');
//$statement = $dbConnect->query("SELECT * FROM users");
//$users = $statement->fetchAll(PDO::FETCH_ASSOC);

//$statement = $dbConnect->query("SELECT * FROM posts");
//$posts = $statement->fetchAll(PDO::FETCH_ASSOC);