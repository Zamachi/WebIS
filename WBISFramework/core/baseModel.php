<?php

namespace app\core;

abstract class BaseModel
{
    // public const RULE_EMAIL = '/^[A-z]{1}[A-z_\d\-\.]+@[a-z]+mail\.(com|ac\.rs)$/';
    // public const RULE_REQUIRED = "Required";
    // public const RULE_PASSWORD = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{8,}$/";
    // public const RULE_USERNAME = "/^(\w{8,32}\s)+$/";

    public const RULE_EMAIL = 'email';
    public const RULE_REQUIRED = "required";
    public const RULE_PASSWORD = "password";
    public const RULE_USERNAME = "username";
    public const RULE_MATCH = "match";

    public array $greske = [];

    public abstract function rules(): array;

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($rule)) {
                    $ruleName = $rule[0];
                }

                if ($ruleName === self::RULE_REQUIRED && !$value) {
                   $this->addErrors($attribute,$ruleName);
                }

                if($ruleName === self::RULE_EMAIL && !filter_var($value,FILTER_VALIDATE_EMAIL)){
                    $this->addErrors($attribute,$ruleName);
                }

                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']} ) {
                    $this->addErrorsWithParams($attribute,self::RULE_MATCH,$rule);
                }

            }
        }
    }

    public function addErrors($attribute,$rule)
    {

        $message = $this->errorMessages()[$rule];
        return $this->greske[$attribute][] = $message;
    }

    public function addErrorsWithParams($attribute,$rule,$params)
    {

        $message = $this->errorMessages()[$rule];
        foreach ($params as $key => $value) {
            $message = str_replace("{$key}",$value,$message);
        }
        return $this->greske[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_EMAIL => "The email is in invalid format",
            self::RULE_PASSWORD => "The password is in invalid format",
            self::RULE_REQUIRED => "This field is required",
            self::RULE_USERNAME => "Username is invalid format",
            self::RULE_MATCH => "This field must be the same as {match}"

        ];
    }
}
