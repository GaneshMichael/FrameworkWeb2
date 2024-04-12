<?php

namespace TCG\Utils;

use TCG\Database\DbConnect;

class Validation
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';

    //  Checks if the value is not empty.
    public static function required($value)
    {
        return !empty($value);
    }

    // Validates if the value is a valid email address
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    // Validates if the value meets a minimum length requirement.
    public static function min($value, $params)
    {
        $minLength = $params['min'] ?? 0;
        return strlen($value) >= $minLength;
    }

    // Validates if the value meets a maximum length requirement.
    public static function max($value, $params)
    {
        $maxValue = $params['max'] ?? PHP_INT_MAX;
        return $value <= $maxValue;
    }

    // Validates if the value matches another attribute's value.
    public static function match($value, $params)
    {
        $attribute = $params['match'] ?? '';
        return $value === $params[$attribute];
    }

    // Validates if the value is unique in the specified database table and attribute.
    public static function unique($value, $params)
    {
        $db = DbConnect::getConnection();
        $className = $params['class'];
        $uniqueAttr = $params['attribute'];
        $tableName = $className::tableName();
        $statement = $db->getPdo()->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
        $statement->bindValue(":attr", $value);
        $statement->execute();
        $record = $statement->fetchObject();
        return !$record;
    }

    // Returns the corresponding error message for a validation rule.
    public static function getErrorMessage($rule)
    {
        $messages = [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be a valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE => 'Record with this {field} already exists',
        ];

        return $messages[$rule] ?? '';
    }
}