<?php

namespace DiStudy\DbServices\Pdo;

use DiStudy\Interfaces\ConnectionInterface;
use DiStudy\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    private ConnectionInterface $connection;
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }
    public function select($table)
    {
        $db = $this->connection->make();
        return $db->query("SELECT * FROM $table")->fetchAll(\PDO::FETCH_ASSOC);
    }
}