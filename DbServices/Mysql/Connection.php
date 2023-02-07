<?php

namespace DiStudy\DbServices\Mysql;

use DiStudy\interfaces\DbConfigInterfaces;
use DiStudy\interfaces\ConnectionInterface;


class Connection implements ConnectionInterface
{
    private $dbConfigs;

    public function __construct(DbConfigInterfaces $config){
        $this->dbConfigs = $config;
    }

    public function make() : \mysqli
    {
        return new \mysqli($this->dbConfigs->getHostName(), $this->dbConfigs->getUserName(), $this->dbConfigs->getDbPassword(),
        $this->dbConfigs->getDbName());
    }
}