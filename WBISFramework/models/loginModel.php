<?php


namespace app\models;


use app\core\DBModel;

class LoginModel extends DBModel
{
    public string $mail = '';
    public string $password = '';


    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            'mail',
            'password'
        ];
    }

    public function rules(): array
    {
        return [
            'mail' => [self::RULE_EMAIL, self::RULE_REQUIRED, self::IS_ACTIVE],
            'password' => [self::RULE_REQUIRED, self::RULE_PASSWORD]
        ];
    }

    public function labels(): array
    {
        return [
            'mail' => "Email",
            'password' => "Password"
        ];
    }

    public function login(LoginModel $model)
    {
        $modelDB = new LoginModel();

        $modelDB->loadData($model->one("mail = '$model->mail';"));

        if ($modelDB !== null)
        {
            if (password_verify($model->password, $modelDB->password)){
                return true;
            }
        }

        return false;
    }
}