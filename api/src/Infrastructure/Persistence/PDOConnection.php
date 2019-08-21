<?php

namespace App\Infrastructure\Persistence;

class PDOConnection
{

    public $pdo;

    public function __construct()
    {
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $name = getenv('DB_DATABASE');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASSWORD');

        $this->pdo = new \PDO("mysql:host=$host:$port;dbname=$name", $user, $pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
}
