<?php

namespace TCG\Database;

use PDO;
use PDOException;
class Database {
    private $pdo;

    public function __construct()
    {
        try {
            // connecting to the db by path
           $this->pdo = new PDO('sqlite:tcg.db');

           // set the error mode exceptions
           $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           // print if successfully connected
            echo "Connected to the database successfully.";
        } catch (PDOException $e) {
            // Handle connection errors
            echo "Connection failed: " . $e->getMessage();
        }
    }
}