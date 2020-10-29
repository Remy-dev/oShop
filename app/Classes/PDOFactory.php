<?php

namespace Oshop\Classes;

class PDOFactory
{
    static public function getMysqlConnectionWithPDO()
    {
        $db = new PDO ('mysql:hostname=localhost;dbname=oshop;charset=utf8', 'oshop', 'oshop');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    
}