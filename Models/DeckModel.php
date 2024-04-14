<?php

namespace TCG\Models;

use TCG\Core\Application;
use TCG\Database\DatabaseModel;
use TCG\Utils\Validation;

class DeckModel extends DatabaseModel
{
    public string $name;
    public string $cards;
    public int $user_id;
    public $id;
    public $created_at;
    public $updated_at;

    // Define validation rules for deck attributes.
    public function rules(): array
    {
        return [
            'name' => [Validation::RULE_REQUIRED],
            'cards' => [Validation::RULE_REQUIRED]
        ];

        return $rules;
    }

    // Get the table name for the decks.
    public static function tableName(): string
    {
        return 'decks';
    }

    public function update(): bool
    {
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        return parent::update();
    }

    // Save the deck data to the database.
    public function register(): bool
    {
        return $this->save();
    }

    // Get the list of attributes to be saved in the database.
    public function attributes(): array
    {
        return ['name', 'cards', 'user_id'];
    }

    // Get the primary key for the decks table.
    public function primaryKey(): string
    {
        return 'id';
    }

    // Get the labels for the deck attributes.
    public function labels(): array
    {
        return [
            'name' => 'Naam',
            'cards' => 'Cards[]'
        ];
    }

    public function getCardNames(): array
    {
        $cardIds = explode(',', $this->cards);
        $cardNames = [];

        foreach ($cardIds as $cardId) {
            $card = CardModel::findOne(['id' => $cardId]);
            if ($card) {
                $cardNames[] = $card->name;
            }
        }

        return $cardNames;
    }
    public function getUserName(): string
    {
        $user = UserModel::findOne(['id' => $this->user_id]);
        return $user ? $user->displayName() : '';
    }

}
