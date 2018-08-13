<?php

namespace Laetitia_Bernardi\projet4\Model;
use \PDO;


class Manager
{
   
    private $_db;

   
    public function getDb()
    {
        return $this->_db;
    }


    protected function dbConnect()
    {
        $host = 'mysql:host=localhost;';
        $database = 'dbname=blog_jean_forteroche';
        $dsn = $host . $database;
        $username = 'root';
        $password = '';

        $this->_db = new \PDO($dsn . ';charset=utf8', $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $this->_db;
    }
}