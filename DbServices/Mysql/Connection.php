<?php

namespace DiStudy\DbServices\Mysql;

use DiStudy\Interfaces\DbConfigInterface;

class Connection implements ConnectionInterface
{
    private $dbConfigs;

    public function __construct(DbConfigInterface $config){
        $this->dbConfigs = $config;
    }

    public function make()
    {
        return new \mysqli($this->dbConfigs->getHostName(), $this->dbConfigs->getUserName(), $this->dbConfigs->getDbPassword(),
        $this->dbConfigs->getDbName());
    }
}