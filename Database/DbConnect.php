<?php

namespace TCG\Database;

class DbConnect
{
    // The instance of the database connection.
    private static ?DatabaseConnection $DbConnect = null;

    // Get the database connection
    public static function getConnection(): DatabaseConnection
    {
        if (self::$DbConnect === null) {
            self::$DbConnect = Database::create();
        }

        return self::$DbConnect;
    }
}