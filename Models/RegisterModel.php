<?php

namespace TCG\Models;

use TCG\Core\Model;
use TCG\Utils\Validation;

class RegisterModel extends Model
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function register()
    {
        return 'Creating new user';
    }

    public function rules(): array
    {
        return [
            'firstname' => [Validation::RULE_REQUIRED],
            'lastname' => [Validation::RULE_REQUIRED],
            'email' => [Validation::RULE_REQUIRED, Validation::RULE_EMAIL],
            'password' => [Validation::RULE_REQUIRED, [Validation::RULE_MIN, 'min' => 10], [Validation::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [Validation::RULE_REQUIRED, [Validation::RULE_MATCH, 'match' => 'password']],
        ];
    }

}