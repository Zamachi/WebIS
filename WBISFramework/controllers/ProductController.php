<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\DevelopersModel;
use app\models\ProductModel;
use app\models\TagsModel;
use app\models\UserModel;

class ProductController extends Controller
{

    public function products()
    {
        $roles = ['User','Guest','Admin','SuperAdmin'];
        $user = Application::$app->session->getAuth('user');
        $this->checkRole($roles, $user);

        $tags = new TagsModel();
        $developers = new DevelopersModel();
        $model['tags'] = $tags->all();
        $model['developers'] = $developers->all();
        $model['search'] = $_REQUEST['search'] ?? '';

        return $this->view("products", "main", $model);
    }

    public function productsJSON()
    {
        $roles = ['User','Guest','Admin','SuperAdmin'];
        $user = Application::$app->session->getAuth('user');
        $this->checkRole($roles, $user);

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
        $user = null;
        if (Application::$app->session->getAuth('user')) {
            $user = Application::$app->session->getAuth('user')->user_id;
        }

        $rezultat = $products->fetchCodes( (int)$_REQUEST['game_id'], $user, $start_from, $items_per_page );
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

        $user = null;
        if (Application::$app->session->getAuth('user')) {
            $user = Application::$app->session->getAuth('user')->user_id;
        }

        $rezultat = $products->fetchCodes((int)$_GET['game_id'], $user, $start_from, $items_per_page);
        $model['codes'] = $rezultat[0];
        $model['total_pages'] = ceil($rezultat[1] / $items_per_page);
        $model['current_page'] = $current_page;

        return json_encode($model);
    }

    public function codesPerMonthSold()
    {
        $roles = ['SuperAdmin'];
        $user = Application::$app->session->getAuth('user');
        $this->checkRole($roles, $user);

        $products = new ProductModel();

        return json_encode($products->codesPerMonthSold());
    }

    public function codesPerMonthPerTagSold()
    {
        $roles = ['SuperAdmin'];
        $user = Application::$app->session->getAuth('user');
        $this->checkRole($roles, $user);

        $date_from = $_GET['date_from'] ?? date("Y-m-d", strtotime("-1 month"));
        $date_to = $_GET['date_to'] ?? date('Y-m-d',time());

        // var_dump($date_from);
        // var_dump($date_to);
        $products = new ProductModel();

        return json_encode($products->codesPerMonthPerTagSold($date_from,$date_to));
    }
    

    public function athorize()
    {
        return ['User','Guest','Admin','SuperAdmin'];
    }
}
