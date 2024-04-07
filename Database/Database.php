<?php

namespace TCG\Database;

use PDO;
use PDOException;
class Database {
    private $pdo;

    public function __construct()
    {
        try {
           $this->pdo = new PDO('sqlite:tcg.db');

           $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to the database successfully.";
        } catch (PDOException $e) {
            // Handle connection errors
            echo "Connection failed: " . $e->getMessage();
        }
    }
}