<?php

namespace DiStudy\Configs;

use DiStudy\Interfaces\DbConfigInterface;

class DbConfigsJson implements DbConfigInterface
{
    private string $filename;

    private string $hostName;
    private string $dbname;
    private string $userName;
    private string $password;

    public function __construct($file = 'default.json'){
        $this->filename = $file;
        $this->getConfig();
    }

    private function getConfig(): void
    {
        $configs = file_get_contents($this->filename);
        $array = json_decode($configs, true);
        $this->hostName = $array['hostname'];
        $this->dbname = $array['db_name'];
        $this->userName = $array['userName'];
        $this->password = $array['password'];
    }

    public function getHostName(): string
    {
        return $this->hostName;
    }

    public function getDbName(): string
    {
        return $this->dbname;
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