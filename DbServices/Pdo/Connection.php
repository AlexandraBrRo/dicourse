<?php

namespace DiStudy\DbServices\Pdo;

use DiStudy\interfaces\ConnectionInterface;
use DiStudy\interfaces\DbConfigInterfaces;


class Connection implements ConnectionInterface{
    private $dbConfigs;
    public function __construct(DbConfigInterfaces $config)
    {
        $this->dbConfigs = $config;
    }
    public function make(): \PDO
    {
        return new \PDO("mysql:host=" . $this->dbConfigs->getHostName() . ";dbname=" . $this->dbConfigs->getDbName(), $this->dbConfigs->getUserName(), $this->dbConfigs->getDbPassword());
    }
}
