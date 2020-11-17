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

}
