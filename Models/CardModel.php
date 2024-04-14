<?php

namespace TCG\Models;

use TCG\Core\Application;
use TCG\Database\DatabaseModel;
use TCG\Utils\Validation;

class CardModel extends DatabaseModel
{
    public string $name = '';
    public string $description = '';
    public int $power = 0;
    public int $defense = 0;
    public string $rarity = '';
    public string $type = '';
    public string $cardSet = '';
    public int $marketValue = 0;
    public $id;
    public $created_at;
    public $updated_at;
    public $updates_by;
    public string $scenario = '';

    // Define validation rules for card attributes.
    public function rules(): array
    {
        return [
            'name' => [Validation::RULE_REQUIRED],
            'description' => [Validation::RULE_REQUIRED],
            'power' => [Validation::RULE_REQUIRED],
            'defense' => [Validation::RULE_REQUIRED],
            'rarity' => [Validation::RULE_REQUIRED],
            'type' => [Validation::RULE_REQUIRED],
            'cardSet' => [Validation::RULE_REQUIRED],
            'marketValue' => [Validation::RULE_REQUIRED],
        ];
    }

// Retrieve all objects from the database table based on filter parameters.
    public static function findAllObjects($nameFilter = null, $rarityFilter = null, $typeFilter = null): array
    {
        $tableName = static::tableName();
        $db = self::getDb();
        $conditions = [];
        $params = [];

        // Add conditions based on filter parameters
        if ($nameFilter !== null) {
            $conditions[] = 'name LIKE :name';
            $params[':name'] = "%$nameFilter%";
        }
        if ($rarityFilter !== null) {
            if ($rarityFilter === '') {
                // If "Alle" is selected, do not apply rarity filter
            } else {
                $conditions[] = 'rarity = :rarity';
                $params[':rarity'] = $rarityFilter;
            }
        }
        if ($typeFilter !== null) {
            if ($typeFilter === '') {
                // If "Alle" is selected, do not apply type filter
            } else {
                $conditions[] = 'type = :type';
                $params[':type'] = $typeFilter;
            }
        }

        // Construct the SQL query with conditions
        $sql = "SELECT * FROM $tableName";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        // Prepare and execute the query
        $statement = $db->prepare($sql);
        $statement->execute($params);

        // Fetch objects and return them
        $objects = [];
        while ($row = $statement->fetchObject(static::class)) {
            $objects[] = $row;
        }
        return $objects;
    }


    public function update(): bool
    {
        $this->created_at = date('Y-m-d H:i:s');
        $this->updates_by = Application::$app->user->id;
        $this->updated_at = date('Y-m-d H:i:s');
        return parent::update();
    }
    // Save the card data to the database.
    public function register()
    {
        return $this->save();
    }

    // Get the table name for the cards.
    public static function tableName(): string
    {
        return 'cards';
    }

    //  Get the list of attributes to be saved in the database.
    public function attributes(): array
    {
        return ['name', 'description', 'power', 'defense', 'rarity', 'type', 'cardSet', 'marketValue'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }
}