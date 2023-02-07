<?php

namespace DiStudy\interfaces;

interface DbConfigInterfaces
{

    public function getHostName() : string;

    public function getDbName() : string;

    public function getUserName() : string;

    public function getDbPassword() : string;

}