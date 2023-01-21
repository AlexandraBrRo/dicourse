<?php
namespace DiStudy\Interfaces;

interface DbConfigInterface{
    public function getHostName();
    public function getDbName();
    public function getUserName();
    public function getDbPassword();
}
