<?php

namespace DiStudy\Configs;

use DiStudy\interfaces\DbConfigInterfaces;


class DbConfigsJson implements DbConfigInterfaces
{
    private string $filename;

    private string $hostName;
    private string $dbName;
    private string $userName;
    private string $password;


    public function __construct($file){
        $this->filename = $file;
        $this->getConfig();
    }

    private function getConfig(): void
    {
        $configs = file_get_contents($this->filename);
        $array = json_decode($configs, true, 512, JSON_THROW_ON_ERROR);
        $this->hostName = $array['hostname'];
        $this->dbName = $array['db_name'];
        $this->userName = $array['username'];
        $this->password = $array['password'];
    }

    public function getHostName(): string
    {
        return $this->hostName;
    }

    public function getDbName(): string
    {
        return $this->dbName;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getDbPassword(): string
    {
        return $this->password;
    }
}