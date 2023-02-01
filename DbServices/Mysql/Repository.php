<?php

namespace DiStudy\DbServices\Mysql;

use DiStudy\Interfaces\ConnectionInterface;
use DiStudy\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    /**
     * @var $connection ConnectionInterface
     */
    private ConnectionInterface $connection;

    public function __construct(ConnectionInterface $connection){
        $this->connection = $connection;
    }

    public function select($table)
    {
//        $db = $this->connection->make();
//        $db->mysqli_query("SELECT * FROM $table");
//        return $db->fatch_assoc();
        $query = $this->connection->make()->query('SELECT * FROM' . $table)->fetch_assoc();
        return $query;

    }
}