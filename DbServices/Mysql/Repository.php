<?php

namespace DiStudy\DbServices\Mysql;

use DiStudy\interfaces\ConnectionInterface;
use DiStudy\interfaces\RepositoryInterface;

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
        return $this->connection->make()->query('SELECT * FROM ' . $table)->fetch_assoc();

    }
}