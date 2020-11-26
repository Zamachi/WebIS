<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DBModel;

class ProductModel extends DBModel
{

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

    function tableName()
    {
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

    public function createGame(ProductModel $model) //NOTE: ne znam da li radi, moracemo da proverimo
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

    public function gameSearch($parametri,$start,$how_much)
    {

        if (!empty($parametri)) {

            switch ((array_keys($parametri)[0])) {
                case 'search':
                    $queryString = $parametri['search'];
                    $sql = "SELECT *
                FROM 
                    `games`
                WHERE UPPER(`title`) LIKE '%" . $queryString . "%' LIMIT $start,$how_much";
                    break;
                case 'tag_id':
                    $queryString = (int)$parametri['tag_id'];
                    $sql = "SELECT g.*
                    FROM `games` g INNER JOIN `games_tags` gt ON g.game_id = gt.game_id INNER JOIN `tags` t ON gt.tag_id = t.tag_id
                    WHERE `gt`.`tag_id` = " . $queryString . "";
                    break;
                case 'developer_id':
                    $queryString = (int)$parametri['developer_id'];
                    $sql = "SELECT g.*
                    FROM `games` g INNER JOIN `developed_by` dbt ON g.game_id = dbt.game_id INNER JOIN `developers` t ON dbt.developer_id = t.developer_id
                    WHERE `dbt`.`developer_id` = " . $queryString . "";
                    break;

                default:
                    return "Greska";
                    exit;
            }

            $dataResult = $this->dbConnection->conn()->query($sql) or die();
            $resultArray = [];

            while ($result = $dataResult->fetch_assoc()) {
                array_push($resultArray, $result);
            }
        } else {
            $resultArray = $this->all();
        }
        return [array_slice($resultArray,$start,$how_much),count($resultArray)];
    }
    public function fetchCodes($game_id)
    {
            $sql = "SELECT g.*,c.*
            FROM `games` g 
            INNER JOIN `codes` c ON c.game_id = ".$game_id." 
            INNER JOIN `users` u ON u.user_id = c.user_id
            WHERE c.is_sold=0 AND g.game_id = 1 AND u.is_active = 1
            ORDER BY price;";

            $dataResult = $this->dbConnection->conn()->query($sql) or die();
            $resultArray = [];
            while ($result = $dataResult->fetch_assoc()) {
                array_push($resultArray, $result);
            }

            return $resultArray;
    }

    public function fetchGameDevsAndTags($game_id)
    {

       $sql= "SELECT t.tag_name, d.developer_name
        FROM codes c 
        INNER JOIN games_tags gt ON c.game_id = gt.game_id
        INNER JOIN tags t ON gt.tag_id = t.tag_id
        INNER JOIN developed_by db ON  db.game_id = c.game_id
        INNER JOIN developers d ON d.developer_id = db.developer_id
        WHERE c.game_id = ".$game_id."
        GROUP BY tag_name, developer_name;";

        $dataResult = $this->dbConnection->conn()->query($sql) or die();
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            $resultArray['developers']=$result['developer_name'];
            $resultArray['tags']=$result['tag_name'];
        }

        return $resultArray;
    }
}
