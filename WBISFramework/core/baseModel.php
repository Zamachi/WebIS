<?php

namespace app\core;

abstract class BaseModel
{
    public const RULE_EMAIL = 'email';
    public const RULE_REQUIRED = "required";
    public const RULE_PASSWORD = "password";
    public const RULE_USERNAME = "username";
    public const RULE_MATCH = "match";
    public const RULE_EMAIL_UNIQUE = 'emailUnique';
    public const RULE_USERNAME_UNIQUE = 'usernameUnique';
    public const IS_ACTIVE = 'userInactive';

    public $greske;
    public $success;
    public DBConnection $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }
    public abstract function rules(): array;

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function returnLoadData($data)
    {
        if (is_array($data)) {
            foreach ($data as $item) {
                foreach ($item as $key => $value) {
                    if (property_exists($this, $key)) {
                        $this->{$key} = $value;
                    }
                }
            }
        } else {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->{$key} = $value;
                }
            }
        }

        return $data;
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

                if($ruleName === self::RULE_PASSWORD){
                    $res = array("options"=>array("regexp"=>"/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{8,}$/"));
                    if(!filter_var($value,FILTER_VALIDATE_REGEXP,$res)){
                        $this->addErrors($attribute,$ruleName);
                    }
                }

                if ($ruleName === self::RULE_USERNAME) {
                    $res = array("options"=>array("regexp"=>"/^([A-z]{3,}\s*){1,3}$/"));
                    if(!filter_var($value,FILTER_VALIDATE_REGEXP,$res)){
                        $this->addErrors($attribute,$ruleName);
                    }
                }

                if ($ruleName === self::RULE_EMAIL_UNIQUE && $this->uniqueEmail($value)) {
                    $this->addErrors($attribute, $ruleName);
                }
                if ($ruleName === self::RULE_USERNAME_UNIQUE && $this->uniqueUsername($value)) {
                    $this->addErrors($attribute, $ruleName);
                }
                if ($ruleName === self::IS_ACTIVE && !$this->isUserActive($value)) {
                    $this->addErrors($attribute, $ruleName);
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

        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{".$key."}",$value,$message);
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
            self::RULE_MATCH => "This field must be the same as {match}",
            self::RULE_EMAIL_UNIQUE => "Email already exists",
            self::RULE_USERNAME_UNIQUE => "Username already exists",
            self::IS_ACTIVE => "The user does not exist."

        ];
    }

    public function existError($attribute)
    {
        return $this->greske[$attribute] ?? false;
    }

    public function firstError($attribute)
    {
        return $this->greske[$attribute][0] ?? false;
    }

    public function isUserActive($email)
    {
        $db = $this->dbConnection->conn();

        $sqlString = "SELECT * FROM users WHERE `mail` = '$email' AND `is_active`=1;";

        $dataResult = $db->query($sqlString) or die();

        $result = $dataResult->fetch_assoc();

        if ($result !== null)
            return true;

        return false;
    }

    public function uniqueEmail($email)
    {
        $db = $this->dbConnection->conn();

        $sqlString = "SELECT * FROM users WHERE `mail` = '$email';";

        $dataResult = $db->query($sqlString) or die();

        $result = $dataResult->fetch_assoc();

        if ($result !== null)
            return true;

        return false;
    }

    public function uniqueUsername($username)
    {
        $db = $this->dbConnection->conn();

        $sqlString = "SELECT * FROM users WHERE `username` = '$username';";

        $dataResult = $db->query($sqlString) or die();

        $result = $dataResult->fetch_assoc();

        if ($result !== null)
            return true;

        return false;
    }
}
