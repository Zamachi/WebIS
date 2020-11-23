<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DBModel;

class ProductModel extends DBModel{

    public $game_id;
    public $title;
    public $publish_date;
    public $base_price;
    public $image;
    public $description;
    public $current_price;

    public function rules(): array //TODO: dodati neophodna pravila
    {
        return [];
    }

    function tableName(){
        return "games";
    }

    function attributes(): array
    {
        return [
            "game_id",
            "title",
            "publish_date",
            "base_price",
            "image",
            "description",
            "current_price"

        ];
    }

    public function createGame(ProductModel $model)
    {
        $model->create();
        $developersModel = new DevelopersModel();

        $user = $developersModel->one("mail = '$model->mail';");
        $developersModel->loadData($user);

        $rolesModel = new RolesModel();
        $rolesModel->role_name = "User";
        $role = $rolesModel->one("role_name = '$rolesModel->role_name'");
        $rolesModel->loadData($role);

        $tagsModel = new TagsModel();

        $tagsModel->tag_id = $rolesModel->tag_id;
        $tagsModel->tag_name = $developersModel->user_id;

        $tagsModel->create();

        return true;
    }
}