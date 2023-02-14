<?php

namespace DiStudy\Configs;
use DiStudy\interfaces\DbConfigInterfaces;

class DbConfigsHardCode implements DbConfigInterfaces
{
   public function getHostName(): string
   {
       return 'localhost';
   }

   public function getDbName(): string
   {
       return 'dicourse';
   }

   public function getUserName(): string
   {
       return 'root';
   }

   public function getDbPassword(): string
   {
       return '';
   }

}