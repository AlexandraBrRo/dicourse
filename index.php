<?php

use DiStudy\Configs\DbConfigsHardCode;
use DiStudy\Configs\DbConfigsJson;
//use DiStudy\DbServices\Pdo\Connection;
//use DiStudy\DbServices\Pdo\Repository;
use DiStudy\DbServices\Mysql\Connection;
use DiStudy\DbServices\Mysql\Repository;

require __DIR__ . '/vendor/autoload.php';

//$json = 'dbConfig.json';
//$a = file_get_contents($json);
//$b = json_decode($a, true);
//var_dump($a);


//$dbConfigs = new DbConfigsHardCode();
$dbConfigs = new DbConfigsJson('dbConfig.json');
$connection = new Connection($dbConfigs);
$repository= new Repository($connection);

$users = $repository->select('users');
$posts = $repository->select('posts');

echo $users[0]['email'] . '<dr>';
echo $posts[0]['title'];








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

