<?php

namespace DiStudy\DbServices\Pdo;

use DiStudy\Interfaces\ConnectionInterface;
use DiStudy\Interfaces\DbConfigInterface;


class Connection implements ConnectionInterface{
    private $dbConfigs;
    public function __construct(DbConfigInterface $config)
    {
        $this->dbConfigs = $config;
    }
    public function make(): \PDO
    {
        return new \PDO("mysql:host=" . $this->dbConfigs->getHostName() . ";dbname="
            . $this->dbConfigs->getDbName(), $this->dbConfigs->getUserName(), $this->dbConfigs->getDbPassword());
    }
}
