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
    public string $set = '';
    public int $marketValue = 0;

public function rules(): array
    {
        return [
            'name' => [Validation::RULE_REQUIRED],
            'description' => [Validation::RULE_REQUIRED],
            'power' => [Validation::RULE_REQUIRED],
            'defense' => [Validation::RULE_REQUIRED],
            'rarity' => [Validation::RULE_REQUIRED],
            'type' => [Validation::RULE_REQUIRED],
            'set' => [Validation::RULE_REQUIRED],
            '$marketValue' => [Validation::RULE_REQUIRED],
        ];
    }

    #[\Override] public static function tableName(): string
    {
        return 'cards';
    }

    #[\Override] public function attributes(): array
    {
        return ['name', 'description', 'power', 'defense', 'rarity', 'type', 'set', 'marketValue'];
    }

    #[\Override] public function primaryKey(): string
    {
        return 'id';
    }
}