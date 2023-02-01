<?php

namespace DiStudy\DbServices\PostcodeServices;
use DiStudy\Interfaces\ConnectionInterface;

class PostcodeRepository implements PostcodeInterface
{
    private $db;
    private $table;

    public function __construct(ConnectionInterface $connection, $tableName)
    {
        $this->db = $connection;
        $this->table = $tableName;
    }
    public function getByPostcode(string $postcode): array
    {
        $connection = $this->db->make();
        $query = $connection->query("SELECT * FROM '$this->table' WHERE `postcode` = $postcode");
        return $query->fetch(\PDO::FETCH_ASSOC) ? : [];
    }
}