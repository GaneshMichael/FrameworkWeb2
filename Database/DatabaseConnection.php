<?php

namespace TCG\Database;

use PDO;

interface DatabaseConnection
{
    // Get the PDO object for the database connection.
    public function getPdo(): PDO;

}