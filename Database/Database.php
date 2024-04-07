<?php

namespace TCG\Database;

use PDO;
use PDOException;
class Database {
    private $pdo;

    public function __construct($db_file) {
        try {
            // Create a PDO connection to the SQLite database
            $this->pdo = new PDO("sqlite:$db_file");

            // Set error mode to exceptions
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Output message indicating successful connection
            echo "Connected to the database successfully.";
        } catch (PDOException $e) {
            // Handle connection errors
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Other methods of your Database class can utilize $this->pdo for database operations
}

// Usage example
$db = new Database('tcg.db');