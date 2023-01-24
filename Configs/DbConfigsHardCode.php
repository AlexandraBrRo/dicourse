<?php

namespace DiStudy\Configs;
use DiStudy\Interfaces\DbConfigInterface;

class DbConfigsHardCode implements DbConfigInterface
{
   public function getHostName(): string
   {
       // TODO: Implement getHostName() method.
       return 'localhost';
   }

   public function getDbName(): string
   {
       // TODO: Implement getDbName() method.
       return 'dicourse';
   }

   public function getUserName(): string
   {
       // TODO: Implement getUserName() method.
       return 'root';
   }

   public function getDbPassword(): string
   {
       // TODO: Implement getDbPassword() method.
       return '';
   }

}