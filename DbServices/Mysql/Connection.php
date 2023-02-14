<?php

namespace DiStudy\DbServices\Mysql;

use DiStudy\Interfaces\DbConfigInterfaces;
use DiStudy\Interfaces\ConnectionInterface;
use mysqli;

class Connection implements ConnectionInterface
{
    private DbConfigInterfaces $dbConfigs;

    public function __construct(DbConfigInterfaces $config)
    {
        $this->dbConfigs = $config;
    }

    /**
     * @return mysqli
     */
    public function make() : mysqli
    {
        return new mysqli($this->dbConfigs->getHostName(),$this->dbConfigs->getUserName(),
            $this->dbConfigs->getDbPassword(),$this->dbConfigs->getDbName());
    }
}