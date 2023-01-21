<?php

namespace DiStudy\DbServices\Pdo;

use DiStudy\Interfaces\ConnectionInterface;

class Connection implements ConnectionInterface{
    public function make(): \PDO
    {
        // TODO: Implement make() method.
        return new \PDO("mysql:host=localhost;dbname=dicourse", 'root', '');
    }
}
