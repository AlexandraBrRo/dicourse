<?php

namespace DiStudy\Interfaces;

interface DbConfigInterface
{

    public function getHostName() : string;

    public function getDbName() : string;

    public function getUserName() : string;

    public function getDbPassword() : string;

}