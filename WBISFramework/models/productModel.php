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

    public function gameSearch($search, $developer_id, $tag_id, $start, $how_much)
    {
        $sql = '';

        if ($search !== null and $search !== "") {
            $queryString = $search;
            $sql = "SELECT *
                    FROM 
                        `games`
                    WHERE UPPER(`title`) LIKE '%" . $queryString . "%'";
        }

        if ($developer_id !== null and $developer_id !== "0" and $developer_id !== 0) {
            $queryString = (int)$developer_id;
            $sql = "SELECT g.*
            FROM `games` g INNER JOIN `developed_by` dbt ON g.game_id = dbt.game_id INNER JOIN `developers` t ON dbt.developer_id = t.developer_id
            WHERE `dbt`.`developer_id` = " . $queryString . "";
        }

        if ($tag_id !== null and $tag_id !== "0" and $tag_id !== 0) {
            $queryString = (int)$tag_id;
            $sql = "SELECT g.*
                FROM `games` g INNER JOIN `games_tags` gt ON g.game_id = gt.game_id INNER JOIN `tags` t ON gt.tag_id = t.tag_id
                WHERE `gt`.`tag_id` = " . $queryString . "";
        }

        if ($tag_id !== "0" and $developer_id !== "0") {

            $queryStringTag = (int)$tag_id;
            $queryStringDeveloper = (int)$developer_id;
            $sql = "SELECT g.*
                FROM `games` g 
                INNER JOIN `games_tags` gt ON g.game_id = gt.game_id INNER JOIN `tags` t ON gt.tag_id = t.tag_id
                INNER JOIN `developed_by` db ON db.game_id = g.game_id INNER JOIN `developers` d ON db.developer_id = d.developer_id
                WHERE `gt`.`tag_id` = " . $queryStringTag . " AND `db`.`developer_id` = " . $queryStringDeveloper . "";
        }

        if ($sql === '') {
            $resultArray = $this->all();
        } else {
            $dataResult = $this->dbConnection->conn()->query($sql) or die();
            $resultArray = [];

            while ($result = $dataResult->fetch_assoc()) {
                array_push($resultArray, $result);
            }
        }

        return [array_slice($resultArray, $start, $how_much), count($resultArray)];
    }
    public function fetchCodes($game_id, $user_id, $start_from, $items_per_page)
    {
        if ($user_id === null) {
            $sql = "SELECT g.*,c.*,u.*
            FROM `games` g 
            INNER JOIN `codes` c ON c.game_id = g.game_id 
            INNER JOIN `users` u ON u.user_id = c.user_id
            WHERE c.is_sold=0 AND  g.game_id = " . $game_id . " AND u.is_active = 1 
            ORDER BY price;";
        } else {
            $sql = "SELECT g.*,c.*,u.*
            FROM `games` g 
            INNER JOIN `codes` c ON c.game_id = g.game_id 
            INNER JOIN `users` u ON u.user_id = c.user_id
            WHERE c.is_sold=0 AND g.game_id = " . $game_id . " AND u.is_active = 1 AND c.user_id <> " . $user_id . "
            ORDER BY price;";
        }
        $dataResult = $this->dbConnection->conn()->query($sql) or die();
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return [array_slice($resultArray, $start_from, $items_per_page), count($resultArray)];
    }

    public function fetchGameDevsAndTags($game_id)
    {
        $tags = [];
        $developers = [];

        $sqlTags = "SELECT DISTINCT t.tag_name
        FROM codes c 
        INNER JOIN games_tags gt ON c.game_id = gt.game_id
        INNER JOIN tags t ON gt.tag_id = t.tag_id
        WHERE c.game_id = " . $game_id . ";";

        $sqlDevelopers = "SELECT DISTINCT d.developer_name
        FROM codes c 
        INNER JOIN developed_by db ON  db.game_id = c.game_id
        INNER JOIN developers d ON d.developer_id = db.developer_id
        WHERE c.game_id = " . $game_id . ";";

        $dataResultTags = $this->dbConnection->conn()->query($sqlTags) or die();
        $dataResultDevelopers = $this->dbConnection->conn()->query($sqlDevelopers) or die();
        // while ($tag = $dataResultTags->fetch_assoc() && $dev = $dataResultDevelopers->fetch_assoc()) {
        //     $tags[]=$tag['tag_name'];
        //     $developers[]=$dev['developer_name'];
        // }
        $tags = $dataResultTags->fetch_all();
        $developers = $dataResultDevelopers->fetch_all();
        // var_dump($tags);
        // var_dump($developers);
        // exit;

        return [
            "tags" => $tags, "developers" => $developers
        ];
    }

    public function getTop4Games()
    {
        $db = $this->dbConnection->conn();
        $sqlString = "SELECT g.title, g.`description`, g.image , c.game_id, COUNT(*) as broj 
        FROM codes c INNER JOIN games g ON c.game_id = g.game_id 
        WHERE is_sold=1 
        GROUP BY c.game_id ORDER BY broj DESC 
        LIMIT 4";

        $dataResult = $db->query($sqlString) or die();
        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }


    public function codesPerMonthSold()
    {
        $db = $this->dbConnection->conn();

        $sqlString = "
        SELECT datum, ifnull(broj_prodatih,0) as broj_prod
        FROM (
        select FROM_UNIXTIME(UNIX_TIMESTAMP(CONCAT(year(now() - INTERVAL 1 MONTH),'-',month(now() -  INTERVAL 1 MONTH),'-',n)),'%Y-%m-%d') as `datum` from (
                select (((b4.0 << 1 | b3.0) << 1 | b2.0) << 1 | b1.0) << 1 | b0.0 as n
                        from  (select 0 union all select 1) as b0,
                              (select 0 union all select 1) as b1,
                              (select 0 union all select 1) as b2,
                              (select 0 union all select 1) as b3,
                              (select 0 union all select 1) as b4 ) t
                where n > 0 and n <= day(last_day(now()))
        order by `datum`
        ) datumi LEFT JOIN 
        (SELECT date_sold, COUNT(*) as broj_prodatih
        FROM codes c 
        INNER JOIN games g ON c.game_id = g.game_id 
        LEFT JOIN checkouts ch ON ch.code_id = c.code_id
        WHERE date_sold IS NULL OR date_sold BETWEEN (NOW() - INTERVAL 1 MONTH ) AND NOW()
        GROUP BY date_sold
        ORDER BY date_sold ASC) prodaja
         ON datumi.`datum` = prodaja.`date_sold`  
        ";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }

    public function codesPerMonthPerTagSold($date_from, $date_to)
    {

        $db = $this->dbConnection->conn();
        $sqlString = "
        SELECT t.tag_name, COUNT(*) as broj_prodatih
        FROM codes c 
        INNER JOIN checkouts ch ON c.code_id = ch.code_id
        INNER JOIN games g ON c.game_id = g.game_id
        INNER JOIN games_tags gt ON g.game_id = gt.game_id
        INNER JOIN tags t ON gt.tag_id = t.tag_id
        WHERE ch.`date_sold` BETWEEN '$date_from' AND '$date_to'
        GROUP BY t.tag_name
        ORDER BY broj_prodatih DESC
        LIMIT 5; 
        ";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }
}
