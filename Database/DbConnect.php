<?php

namespace TCG\Database;

class DbConnect
{
    private static ?DatabaseConnection $DbConnect = null;

    public static function getConnection(): DatabaseConnection
    {
        if (self::$DbConnect === null) {
            self::$DbConnect = Database::create();
        }

        return self::$DbConnect;
    }
}