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
    public $account_balance = 0;
    public $is_active;
    public $user_id = '';
    public $avatar = '';

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
            'user_id',
            'is_active',
            'avatar',
            'account_balance'
        ];
    }

    public function rules(): array
    {
        return [
            'mail' => [self::RULE_EMAIL, self::RULE_REQUIRED, self::RULE_EMAIL_UNIQUE],
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

    public function readAllUserDataAdministration($email)
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
                        u.is_active,
                        u.created_at
                from users u
                inner join user_roles ur on u.user_id = ur.user_id
                inner join roles r on r.role_id = ur.role_id
                where `mail` <> '$email'
                ORDER BY `username`, `user_id`
                ";

        $dataResult = $db->query($sqlString) or die();
        $resultArray = [];
        while($result = $dataResult->fetch_assoc()){
            array_push($resultArray,$result);
        }

        return $resultArray;
    }


    public function updateUser(UserModel $model)
    {
        $db = $this->dbConnection->conn();

        $sqlString = "UPDATE users SET 'username' = '$model->username', 'country' = '$model->country', 'mail' = '$model->mail' WHERE `user_id`='$model->user_id'";

        $db->query($sqlString) or die();

        return true;
    }

    public function getCheckoutHistory($user_id)
    {
        $dbConnection = $this->dbConnection->conn();

        $sql = "SELECT ch.checkout_id, ch.code_id, date_sold, c.`code`, price
        FROM users u 
        INNER JOIN checkouts ch ON ch.user_id = u.user_id
        INNER JOIN codes c ON ch.code_id = c.code_id
        WHERE is_sold=1 AND u.`user_id`='$user_id'
        ORDER BY date_sold;";

        $resultArray = [];
        $rezultat = $dbConnection->query($sql);
        while ($red = $rezultat->fetch_assoc()) {
            array_push($resultArray, $red);
        }
        return $resultArray;
    }

    public function getNumberOfActives()
    {
        $dbConnection = $this->dbConnection->conn();

        $sql = "
        select 
        case 
        when `is_active` = 1 then 'Active' 
        else 'Inactive' 
        end as 'active', count(user_id) as 'numberOfCustomers' 
        from users u group by `is_active`
        ";

        $resultArray = [];
        $rezultat = $dbConnection->query($sql);
        while ($red = $rezultat->fetch_assoc()) {
            array_push($resultArray, $red);
        }
        return $resultArray;
    }
}
