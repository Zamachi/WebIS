<?php


namespace app\models;


use app\core\DBModel;

class UploadModel extends DBModel
{
    public string $code = '';
    public string $price = '';

    public function tableName()
    {
        return "users"; //nisam sigurna sta ovde treba da stoji
    }

    public function attributes(): array
    {
        return [
            'code',
            'price'
        ];
    }

    /*
    public function rules(): array
    {
        return [
            'mail' => [self::RULE_EMAIL, self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    */

    public function labels(): array
    {
        return [
            'code' => "Enter your code here",
            'price' => "Enter price"
        ];
    }

    /*
    public function upload(UploadModel $model)
    {
        $model->password = password_hash($model->password, PASSWORD_DEFAULT);

        $model->create();
        $userModel = new UploadModel();

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

    */
}