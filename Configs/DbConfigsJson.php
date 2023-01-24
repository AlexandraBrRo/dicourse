<?php

namespace DiStudy\Configs;

use DiStudy\Interfaces\DbConfigInterface;

class DbConfigsJson implements DbConfigInterface
{
    private string $filename;

    public function __construct($filename){
        $this->filename = $filename;
    }

    private function getConfig()
    {
        $configs = file_get_contents($this->filename);
        return json_decode($configs, true);
    }

    public function getHostName(): string
    {
        return $this->getConfig()['hostname'];
    }

    public function getDbName(): string
    {
        return $this->getConfig()['db_name'];
    }

    public function getUserName(): string
    {
        return $this->getConfig()['username'];
    }

    public function getDbPassword(): string
    {
        return $this->getConfig()['password'];
    }
}