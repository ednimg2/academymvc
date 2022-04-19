<?php

namespace App\Libraries;

use PDO;
use PDOException;

class Database extends PDO
{
    public function __construct()
    {
        try {
            parent::__construct('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';charset=utf8;', DB_USER, DB_PASSWORD);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}