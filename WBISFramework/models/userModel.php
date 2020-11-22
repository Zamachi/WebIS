<?php


namespace app\models;


use app\core\DBModel;

class UserModel extends DBModel
{
    public string $mail = '';
    public string $country = '';
    public string $datumRodjenja = '';
    public string $username = '';
    public string $role_name = '';
    public $user_id = '';

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            'mail',
            'country',
            'datumRodjenja',
            'username',
            'role_name',
            'user_id'
        ];
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_EMAIL, self::RULE_REQUIRED, self::RULE_EMAIL_UNIQUE]
        ];
    }

    public function labels(): array
    {
       return [];
    }

    public function readAllUserData($email)
    {
        $db = $this->dbConnection->conn();

        $sqlString = "select 	
                        u.mail, 
                        u.country, 
                        u.datumRodjenja,
                        u.username, 
                        r.role_name, 
                        u.user_id
                from users u
                inner join user_roles ur on u.user_id = ur.user_id
                inner join roles r on r.role_id = ur.role_id
                where `mail` ='$email'";

        $dataResult = $db->query($sqlString) or die();

        $result = $dataResult->fetch_assoc();

        return $result;
    }

    public function updateUser(UserModel $model)
    {
        $db = $this->dbConnection->conn();

        $sqlString = "UPDATE users SET 'username' = '$model->username', 'country' = '$model->country', 'mail' = '$model->mail' WHERE `user_id`='$model->user_id'";

        $db->query($sqlString) or die();

        return true;
    }

}