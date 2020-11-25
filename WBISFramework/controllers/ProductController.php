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

        $current_page = $_GET['page'] ?? 1;
        $items_per_page = 9;
        $start_from = ($current_page - 1) * $items_per_page;

        $filter = null;
        if(isset(array_keys($_REQUEST)[0])){
            $filter = in_array( array_keys($_REQUEST)[0]  ,["search","developer_id","tag_id"] ) ? $_REQUEST:null;
        }
      
        $rezultat = $products->gameSearch( $filter , $start_from , $items_per_page );
        $model['products'] = $rezultat[0];
        $model['tags'] = $tags->all();
        $model['developers'] = $developers->all();
        $model['total_pages']= ceil( $rezultat[1]/ $items_per_page );
        $model['current_page'] = $current_page;

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