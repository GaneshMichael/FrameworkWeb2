<?php

namespace TCG\Models;

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

    public function register()
    {
        return $this->save();
    }
    public static function tableName(): string
    {
        return 'cards';
    }

    public function attributes(): array
    {
        return ['name', 'description', 'power', 'defense', 'rarity', 'type', 'cardSet', 'marketValue'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }
}