<?php

namespace TCG\Database;

use Exception;
use PDO;
use TCG\Core\Application;

class Database implements DatabaseConnection
{
    private static ?DatabaseConnection $instance = null;
    private PDO $pdo;

    protected function __construct()
    {
        $db = 'TCG.sqlite';
        try {
            $this->pdo = new PDO("sqlite:$db");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    // Create a singleton instance of the Database class.
    public static function create(): DatabaseConnection
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Get the PDO object for the database connection.
    public function getPdo(): PDO
    {
        return $this->pdo;
    }


}
