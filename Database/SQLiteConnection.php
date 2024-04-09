<?php

namespace TCG\Database;

use PDO;

class SQLiteConnection extends Connection
{
    public function __construct()
    {
        $db = '/DB';
        $this->pdo = new PDO("sqlite:$db");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}