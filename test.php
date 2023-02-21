<?php

interface Configs {
    public function getHostName() : string;

    public function getDbName() : string;

    public function getUserName() : string;

    public function getDbPassword() : string;
}

class ConfigsHardcode implements Configs {

    private $dbname;
    private $pass;
    private $user;
    private $host;

    public function __construct($dbname, $pass, $user, $host)
    {
        $this->dbname = $dbname;
        $this->pass = $pass;
        $this->user = $user;
        $this->host = $host;
    }

    public function getHostName() : string {
        return $this->host ;
    }

    public function getDbName() : string {
        return $this->dbname;
    }

    public function getUserName() : string {
        return $this->user;
    }

    public function getDbPassword() : string {
        return $this->pass;
    }
}

interface ConnectionInterface {
    public function make();
}

class Connection implements ConnectionInterface {
    /**
     * @var Configs
     */
    private Configs $dbConfigs;

    public function __construct(Configs $dbConfigs)
    {
        $this->dbConfigs = $dbConfigs;
    }

    public function make(){
       return new \PDO("mysql:host=" . $this->dbConfigs->getHostName()  . ";dbname="
            .$this->dbConfigs->getDbName() ,$this->dbConfigs->getUserName() ,$this->dbConfigs->getDbPassword());
    }
}


interface RepositoryInterface {
    public function select($table, $what, $like);
}

class Repository implements RepositoryInterface {
    /**
     * @var ConnectionInterface
     */
    private ConnectionInterface $connection;

    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public function select($table, $what, $like) : string
    {
        $conn = $this->connection->make();
        $result = $conn->query("SELECT * FROM `$table` WHERE `$what` = $like");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}


$conf = new ConfigsHardcode("", "", "","");

// Створення об'єкту класу Connection з використанням об'єкту Configs
$connection = new Connection($conf);

// Створення об'єкту класу Repository з використанням об'єкту Connection
$repository = new Repository($connection);

// Виклик методу select() на об'єкті класу Repository
$result = $repository->select('$table', '$what', '$like');

// Виведення результату
var_dump($result);


