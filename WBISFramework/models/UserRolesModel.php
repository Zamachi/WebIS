<?php


namespace app\models;


use app\core\DBModel;

class UserRolesModel extends DBModel
{
    public $user_roles_id;
    public $role_id;
    public $user_id;


    public function tableName()
    {
        return "user_roles";
    }

    public function attributes(): array
    {
        return [
            'role_id',
            'user_id'
        ];
    }

    public function rules(): array
    {
       return [];
    }

    public function labels(): array
    {
        return [];
    }
}