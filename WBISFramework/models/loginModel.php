<?php 

namespace app\models;

use app\core\BaseModel;

class LoginModel extends BaseModel{

    public string $mail='';
    public string $password='';

    function rules(): array
    {
        return [
            
            'mail' => [self::RULE_EMAIL,self::RULE_REQUIRED],
            
            'password' => [self::RULE_PASSWORD,self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
           
            'password' => "Enter your password",
            'mail' => "Enter your email"
        ];
    }
}