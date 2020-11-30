<?php


namespace app\models;

use app\core\Application;
use app\core\DBModel;

class UserUpdateModel extends DBModel
{
    public string $mail = '';
    public string $password = '';
    public $avatar = '';

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            'mail',
            'password',
            'avatar'
        ];
    }

    public function rules(): array
    {
        return [
            'mail' => [self::RULE_EMAIL, self::RULE_EMAIL_UNIQUE],
            'password' => [self::RULE_PASSWORD],
            'avatar' => [self::RULE_AVATAR_EXTENSION]
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
                        u.user_id,
                        u.avatar,
                        u.account_balance,
                        u.is_active
                from users u
                inner join user_roles ur on u.user_id = ur.user_id
                inner join roles r on r.role_id = ur.role_id
                where `mail` ='$email'";

        $dataResult = $db->query($sqlString) or die();

        $result = $dataResult->fetch_assoc();

        return $result;
    }

    public function updateUser(UserUpdateModel $model,$user_id)
    {
        $db = $this->dbConnection->conn();
        $sql = "UPDATE `users` SET ";
        $endSQL = " WHERE `user_id` = $user_id";
        
        $varijable = get_object_vars($model);
        foreach ($varijable as $key => $value) {
            if($value !== ''){
                if (strtolower($key) === 'password') {
                    $sql = $sql . "`$key` = '".password_hash($model->password, PASSWORD_DEFAULT)."',";
                }
                if (strtolower($key) === 'mail') {
                    $sql = $sql . "`$key` = '$value',";
                }
                if (strtolower($key) === 'avatar') {
                    $sql = $sql . "`$key` = ".("'/" . "user-data" . "/" . $model->avatar)."',";
                }
            }
        }

        $sql = substr_replace($sql, "", -1);
        $sql = $sql . $endSQL;

        $db->query($sql) or die();

        return $this->one("`user_id` = $user_id");
    }
}
