<?php

namespace TCG\Models;

use TCG\Core\Auth;
use TCG\Database\DatabaseModel;
use TCG\Utils\Validation;

class LoginModel extends DatabaseModel
{
    public string $email = '';
    public string $password = '';

    // Define validation rules for deck attributes.
    public function rules(): array
    {
        return [
            'email' => [Validation::RULE_REQUIRED, Validation::RULE_EMAIL],
            'password' => [Validation::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password'
        ];
    }

    // Get the table name for the decks.
    public static function tableName(): string
    {
        return 'users';
    }


    public function attributes(): array
    {
        return ['email', 'password'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    // Validate user login credentials and perform login.
    public function login(): bool
    {
        $user = UserModel::findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError('email', 'Email bestaat niet');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Oeps, het wachtwoord is niet correct');
            return false;
        }

        Auth::login($user);
        return true;
    }
}