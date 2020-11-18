<?php 

namespace app\models;

use app\core\BaseModel;

class RegisterModel extends BaseModel
{
    
    public string $mail;
    public string $password;
    public string $country;
    public string $datumRodjenja;
    public string $confirmPassword;
    public string $username;

    function rules():array{
        return [
            'mail' => [self::RULE_EMAIL,self::RULE_REQUIRED],
            'password' => [self::RULE_PASSWORD,self::RULE_REQUIRED],
            'username' => [self::RULE_USERNAME,self::RULE_REQUIRED]
        ];
    }
}
