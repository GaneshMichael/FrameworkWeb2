<?php
namespace TCG\Models;

use TCG\Core\Application;
use TCG\Utils\Validation;
use TCG\Database\Connection;

class UserModel
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public static function where($column, $value): self
    {
        $instance = new static();
        $result = $instance->connection->query(
            "SELECT * FROM users WHERE $column = :value",
            ['value' => $value]
        );
        // Instantiate and return user object
    }

}