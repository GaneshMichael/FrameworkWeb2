<?php

namespace TCG\Database;

use TCG\Core\Model;
use PDO;

abstract class DatabaseModel extends Model
{
    // Get the table name associated with the model.
    abstract public static function tableName(): string;

    // Get the attributes that are mass assignable.
    abstract public function attributes(): array;

    // Get the primary key for the model.
    abstract public function primaryKey(): string;

    // Get the PDO object for the database connection
    protected static function getDb(): PDO
    {
        return DbConnect::getConnection()->getPdo();
    }

    // Retrieve all objects from the database table.
    public static function findAllObjects(): array
    {
        $tableName = static::tableName();
        $db = self::getDb();
        $sql = "SELECT * FROM $tableName";
        $statement = $db->prepare($sql);
        $statement->execute();
        $objects = [];
        while ($row = $statement->fetchObject(static::class)) {
            $objects[] = $row;
        }
        return $objects;
    }

    // Retrieve a single object from the database based on the given condition
    public static function findOne($where)
    {
        $tableName = static::tableName();
        $conditionStr = implode(' AND ', array_map(fn ($attr) => "$attr = :$attr", array_keys($where)));
        $query = "SELECT * FROM $tableName WHERE $conditionStr";

        $db = self::getDb();
        $statement = $db->prepare($query);

        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();
        $result = $statement->fetchObject(static::class);

        return ($result !== false) ? $result : null;
    }

    // Save the current model instance to the database.
    public function save(): bool
    {
        $tableName = static::tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::getDb()->prepare(
            "INSERT INTO $tableName (" . implode(',', $attributes) . ")
            VALUES (" . implode(',', $params) . ")"
        );

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        return $statement->execute();
    }

    // Delete the current model instance from the database.
    public function delete(): bool
    {
        $tableName = static::tableName();
        $primaryKey = $this->primaryKey();
        $statement = self::getDb()->prepare("DELETE FROM $tableName WHERE $primaryKey = :id");
        $statement->bindValue(":id", $this->{$primaryKey});
        return $statement->execute();
    }

    // Update the current model instance in the database.
    public function update(): bool
    {
        $tableName = static::tableName();
        $primaryKey = $this->primaryKey();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => "$attr = :$attr", $attributes);
        $params = array_filter($params, function ($param) {
            return !str_contains($param, 'created_at') && !str_contains($param, 'created_by');
        });

        $statement = self::getDb()->prepare(
            "UPDATE $tableName SET " . implode(',', $params) . " WHERE $primaryKey = :id"
        );

        foreach ($attributes as $attribute) {
            if (!str_contains($attribute, 'created_at') && !str_contains($attribute, 'created_by')) {
                $statement->bindValue(":$attribute", $this->{$attribute});
            }
        }

        $statement->bindValue(":id", $this->{$primaryKey});

        return $statement->execute();
    }

    // Load data from an array into the model instance.
    public function loadData($data): static
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            } else {
                echo "Property {$key} does not exist in the model";
            }
        }
        return $this;
    }
}