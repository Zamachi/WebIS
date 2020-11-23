<?php
namespace app\controllers;

use app\core\Controller;
use app\models\DevelopersModel;
use app\models\ProductModel;
use app\models\TagsModel;

class ProductController extends Controller{

    public function products()
    {
        $products = new ProductModel();
        $tags = new TagsModel();
        $developers = new DevelopersModel();

        $model['products'] = $products->gameSearch();
        $model['tags'] = $tags->all();
        $model['developers'] = $developers->all();
        return $this->view("products","main",$model);
    }

    public function productDetails()
    {
       $model = new ProductModel();

       $model = $model->fetchCodes((int)$_REQUEST['game_id']);

       return $this->view("productDetails","main",$model);
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