<?php

namespace DiStudy\DbServices\Mysql;

use DiStudy\Interfaces\ConnectionInterface;

class Repository implements RepositoryInterface
{
    private ConnectionInterface $connection;

    public function __construct(ConnectionInterface $connection){
        $this->connection = $connection;
    }

    public function select($table)
    {
        $db = $this->connection->make();
//        $db->mysqli_query("SELECT * FROM $table");
        return $db->mysqli_query("SELECT * FROM $table");
    }
}