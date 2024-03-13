<?php

namespace TCG\Database;

use PDO;

interface DatabaseConnection
{
    public function getPdo(): PDO;

}