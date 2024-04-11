<?php

namespace TCG\Models;

use TCG\Database\DatabaseModel;
use TCG\Utils\Validation;

class DeckModel extends DatabaseModel
{
    public string $name;
    public array $cards = [];
    public array $selected_cards = [];


    public static function tableName(): string
    {
        return 'decks';
    }

    public function register(): bool
    {
        return $this->save();
    }

    public function attributes(): array
    {
        return ['name', 'postData', 'cards', 'selected_cards'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return [
            'name' => [Validation::RULE_REQUIRED],
            // Add validation rules for other attributes if needed
        ];
    }
}
