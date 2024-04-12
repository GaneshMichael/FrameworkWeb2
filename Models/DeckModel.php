<?php

namespace TCG\Models;

use TCG\Database\DatabaseModel;
use TCG\Utils\Validation;

class DeckModel extends DatabaseModel
{
    public string $name;
    public string $cards;
    public int $user_id;

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
        return ['name', 'cards', 'user_id'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return [
            'name' => [Validation::RULE_REQUIRED],
            'cards' => [Validation::RULE_REQUIRED]
            // Add validation rules for other attributes if needed
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
