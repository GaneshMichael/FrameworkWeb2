<?php
namespace TCG\Models;

use TCG\Core\Application;
use TCG\Utils\Validation;
use TCG\Database\DatabaseModel;

class UserModel extends DatabaseModel
{
    public int $id = 0;
    public string $created_at = '';
    public string $firstName = '';
    public string $username = '';
    public string $lastName = '';

    public string $email = '';
    public string $status = '';
    public string $password = '';
    public string $confirmPassword = '';
    public string $role = '';
    public string $updated_by = '';
    public string $updated_at = '';
    public string $scenario = '';


    public function rules(): array
    {
        $rules = [
            'email' => [
                Validation::RULE_REQUIRED,
                Validation::RULE_EMAIL,
            ],
            'password' => [Validation::RULE_REQUIRED, [Validation::RULE_MIN, 'min' => 8]],
            'firstName' => [Validation::RULE_REQUIRED],
            'lastName' => [Validation::RULE_REQUIRED],
            'role' => [Validation::RULE_REQUIRED],
        ];

        if ($this->scenario === 'register') {
            $rules['confirmPassword'][] = [Validation::RULE_REQUIRED];
            $rules['email'][] = [Validation::RULE_UNIQUE, 'class' => UserModel::class, 'attribute' => 'email'];
        }

        return $rules;
    }


    public static function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {
        return ['firstName', 'lastName', 'email', 'status', 'password', 'role'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }


    public function labels(): array
    {
        return [
            'firstName' => 'Voornaam',
            'lastName' => 'Achternaam',
            'email' => 'Email',
            'password' => 'Wachtwoord',
            'confirmPassword' => 'Wachtwoord herhalen',
        ];
    }

    public function validateConfirmPassword(): bool
    {
        if ($this->password !== $this->confirmPassword) {
            return false;
        }
        return true;
    }

    public function register(): bool
    {
        if ($this->validateConfirmPassword()) {
            $this->status = 'active';
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return $this->save();
        }

        return false;
    }

    public function update(): bool
    {
        $this->updated_by = Application::$app->user->id;
        $this->updated_at = date('Y-m-d H:i:s');
        return parent::update();
    }

    public function displayName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

}