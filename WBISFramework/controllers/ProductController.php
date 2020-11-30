<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\DevelopersModel;
use app\models\ProductModel;
use app\models\TagsModel;

class ProductController extends Controller
{

    public function products()
    {
        $tags = new TagsModel();
        $developers = new DevelopersModel();
        $model['tags'] = $tags->all();
        $model['developers'] = $developers->all();
        $model['search'] = $_REQUEST['search'] ?? '';

        return $this->view("products", "main", $model);
    }

    public function productsJSON()
    {
        $products = new ProductModel();
        $tags = new TagsModel();
        $developers = new DevelopersModel();

        $current_page = $_GET['page'] ?? 1;
        $items_per_page = 9;
        $start_from = ($current_page - 1) * $items_per_page;

        $rezultat = $products->gameSearch($_REQUEST['search'] ?? '', $_REQUEST['developer_id'] ?? '0', $_REQUEST['tag_id'] ?? '0', $start_from, $items_per_page);
        $model['products'] = $rezultat[0];
        for ($i = 0; $i < count($model['products']); $i++) {
            $model['products'][$i]['description'] = (strlen($model['products'][$i]['description']) > 100 ? substr_replace($model['products'][$i]['description'], "...READ MORE", 100) : $model['products'][$i]['description']);
        }
        $model['tags'] = $tags->all();
        $model['developers'] = $developers->all();
        $model['total_pages'] = ceil($rezultat[1] / $items_per_page);
        $model['current_page'] = $current_page;

        return json_encode($model);
    }

    public function productDetails()
    {
        $products = new ProductModel();

        $current_page = $_GET['page'] ?? 1;
        $items_per_page = 20;
        $start_from = ($current_page - 1) * $items_per_page;

        //var_dump($_REQUEST);

        $rezultat = $products->fetchCodes((int)$_REQUEST['game_id'], (int)Application::$app->session->getAuth('user')->user_id, $start_from, $items_per_page);
        $model['codes'] = $rezultat[0];
        $model['developers_and_tags'] = $products->fetchGameDevsAndTags((int)$_REQUEST['game_id']);

        return $this->view("productDetails", "main", $model);
    }

    public function productDetailsJSON()
    {
        $products = new ProductModel();

        $current_page = $_GET['page'] ?? 1;
        $items_per_page = 20;
        $start_from = ($current_page - 1) * $items_per_page;

        $rezultat = $products->fetchCodes((int)$_GET['game_id'], (int)Application::$app->session->getAuth('user')->user_id, $start_from, $items_per_page);
        $model['codes'] = $rezultat[0];
        $model['total_pages'] = ceil($rezultat[1] / $items_per_page);
        $model['current_page'] = $current_page;
        //$model['developers_and_tags'] = $products->fetchGameDevsAndTags((int)$_REQUEST['game_id']);

        return json_encode($model);
    }

    public function codesPerMonthSold()
    {
        $db = $this->getKonekcija()->conn();

        $sqlString = "
        SELECT datum, ifnull(broj_prodatih,0) as broj_prod
        FROM (
        select FROM_UNIXTIME(UNIX_TIMESTAMP(CONCAT(year(now()),'-',month(now()),'-',n)),'%Y-%m-%d') as `datum` from (
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

        return json_encode($resultArray);
    }

    public function codesPerMonthPerTagSold()
    {
        $db = $this->getKonekcija()->conn();

        $sqlString = "
        SELECT t.tag_name, COUNT(*) as broj_prodatih
        FROM codes c 
        INNER JOIN checkouts ch ON c.code_id = ch.code_id
        INNER JOIN games g ON c.game_id = g.game_id
        INNER JOIN games_tags gt ON g.game_id = gt.game_id
        INNER JOIN tags t ON gt.tag_id = t.tag_id
        GROUP BY t.tag_name
        ORDER BY broj_prodatih DESC
        LIMIT 5; 
        ";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return json_encode($resultArray);
    }

    public function athorize()
    {
        return [
            "SuperAdmin",
            "Admin",
            "User"
        ];
    }
}
