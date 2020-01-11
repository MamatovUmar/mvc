<?php

namespace app\core;

use PDO;

class DataBase
{
    public $db;

    public function __construct()
    {
        $config = require 'app/config/db.php';
        $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
    }

}
