<?php

namespace TCG\Database;

use PDO;

class Database implements DatabaseConnection
{
    private static ?DatabaseConnection $instance = null;
    private PDO $pdo;

    public function getPdo(): PDO
    {
        return $this->pdo;
    }


}