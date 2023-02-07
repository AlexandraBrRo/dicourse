<?php

namespace DiStudy\DbServices\PostcodeServices;
use DiStudy\interfaces\ConnectionInterface;
use DiStudy\interfaces\PostcodeInterface;

class PostcodeRepository implements PostcodeInterface
{
    private  ConnectionInterface $db;
    private  $table;

    public function __construct(ConnectionInterface $connection, $tableName)
    {
        $this->db = $connection;
        $this->table = $tableName;
    }
    public function getAllPostcode(string $postcode):array
    {
        $conn = $this->db->make();
        $query = $conn->query("SELECT postcode FROM" . $this->table);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getByPostcode(string $postcode): array
    {
        $connection = $this->db->make();
        $query = $connection->query("SELECT * FROM `$this->table` WHERE `postcode` = $postcode");
        return $query->fetch(\PDO::FETCH_ASSOC) ? : [];
    }

    public function set(string $postcode, $besteta, $worsteta):array
    {
        $conn = $this->db->make();
        $query = $conn->query("SELECT * FROM `$this->table` WHERE `postcode` = $postcode");
        return $query->fetchAll(\PDO::FETCH_ASSOC) ? : [];
    }
}