<?php 

namespace app\models;

use app\core\BaseModel;
use app\core\DBModel;
use app\models\UserRolesModel;

class RegisterModel extends DBModel
{
    
    public string $mail = '';
    public string $password = '';
    public string $country = '';
    public string $datumRodjenja = '';
    public string $confirmPassword = '';
    public $account_balance = 0.0;
    public string $username = '';

    function rules():array{
        return [
            'mail' => [self::RULE_EMAIL,self::RULE_REQUIRED,self::RULE_EMAIL_UNIQUE],
            'password' => [self::RULE_PASSWORD,self::RULE_REQUIRED],
            'username' => [self::RULE_USERNAME,self::RULE_REQUIRED, self::RULE_USERNAME_UNIQUE],
            "confirmPassword" => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public function labels(): array
    {
        return [
            'mail' => "Enter your email",
            'password' => "Enter your password",
            'confirmPassword' => "Confirm your password",
            'username' => 'Enter your username'
        ];
    }

    public function tableName()
    {
        return 'users';
    }

    public function attributes(): array
    {
        return [
            'mail',
            'password',
            'country',
            'account_balance',
            'datumRodjenja',        
            'username'
        ];
    }
    public function register(RegisterModel $model)
    {
        $model->password = password_hash($model->password, PASSWORD_DEFAULT);
        $model->account_balance = (double)rand(0,1000);
        $model->create();
        $userModel = new UserModel();

        $user = $userModel->one("mail = '$model->mail';");
        $userModel->loadData($user);

        $rolesModel = new RolesModel();
        $rolesModel->role_name = "User";
        $role = $rolesModel->one("role_name = '$rolesModel->role_name'");
        $rolesModel->loadData($role);

        $userRolesModel = new UserRolesModel();

        $userRolesModel->role_id = $rolesModel->role_id;
        $userRolesModel->user_id = $userModel->user_id;

        $userRolesModel->create();

        return true;
    }

}
