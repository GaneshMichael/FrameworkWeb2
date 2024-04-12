<?php

namespace TCG\Core;

use Exception;
use TCG\Utils\Validation;

abstract class Model
{
    abstract public function rules(): array;
    public array $errors = [];

    // Define labels for the model attributes.
    public function labels(): array
    {
        return [];
    }

    /**
     * @throws Exception
     */

    // Validate the model attributes based on the defined rules.
    public function validate(): bool
    {
        $this->errors = [];

        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                $params = [];

                if (is_array($rule)) {
                    $ruleName = $rule[0];
                    $params = array_slice($rule, 1);
                }

                $validationMethod = [Validation::class, $ruleName];
                if (is_callable($validationMethod)) {
                    if (!call_user_func($validationMethod, $value, $params)) {
                        $this->addError($attribute, Validation::getErrorMessage($ruleName));
                    }
                } else {
                    throw new Exception("Validation rule '{$ruleName}' is not a valid callback.");
                }
            }
        }

        return empty($this->errors);
    }

    // Add an error message for the specified attribute.
    public function addError(string $attribute, string $message): void
    {
        $this->errors[$attribute][] = $message;
    }
}