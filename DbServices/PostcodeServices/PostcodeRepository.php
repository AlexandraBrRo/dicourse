<?php

namespace DiStudy\DbServices\PostcodeServices;
use DiStudy\Interfaces\ConnectionInterface;

class PostcodeRepository implements \DiStudy\Interfaces\PostcodeInterface
{
    private ConnectionInterface $db;
    private $table;

    public function __construct(ConnectionInterface $connection, $tableName)
    {
        $this->db = $connection;
        $this->table = $tableName;
    }

    public function getAllPostcode(): array
    {
        $conn = $this->db->make();
        $query = $conn->query("SELECT `postcode` FROM  $this->table");
        return $query->fetchAll(\PDO::FETCH_ASSOC) ? : [];
    }

    public function getByPostcode(string $postcode): array
    {
        $connection = $this->db->make();
        $query = $connection->query("SELECT * FROM `$this->table` WHERE `postcode` = $postcode");
    return $query->fetch(\PDO::FETCH_ASSOC) ? : [];
    }

    public function hasPostcode($postcode)
    {
        $connection = $this->db->make();
        $query = $connection->query("SELECT * FROM `$this->table` WHERE `postcode` = $postcode");
        $result = $query->fetch(\PDO::FETCH_ASSOC) ? true : false;
        return $result;
    }


    public function setNewPostcode($postcode, $bestEta, $worstEta): string
    {
        if(!$this->hasPostcode($postcode)) {
            $connection = $this->db->make();
            $connection->query("INSERT INTO $this->table (postcode, best_eta, worst_eta) VALUES ($postcode, $bestEta, $worstEta)");
            return 'записано' . $postcode;
        }else{
            return'таке значення' . $postcode . 'існує';
        }
    }
}