<?php
namespace app\controllers;

use app\core\Controller;
use app\models\DevelopersModel;
use app\models\ProductModel;
use app\models\TagsModel;

class ProductController extends Controller{

    public function products()
    {
        $tags = new TagsModel();
        $developers = new DevelopersModel();
        $model['tags'] = $tags->all();
        $model['developers'] = $developers->all();

        return $this->view("products","main",$model);
    }

    public function productsJSON()
    {
        $products = new ProductModel();
        $tags = new TagsModel();
        $developers = new DevelopersModel();

        $current_page = $_GET['page'] ?? 1;
        $items_per_page = 9;
        $start_from = ($current_page - 1) * $items_per_page;

        // $filter = null;
        // if(isset(array_keys($_REQUEST)[0])){
        //     $filter = in_array(array_keys($_REQUEST)[0]  ,["search","tag_id", ] ) ? $_REQUEST:null;
        // }
      
        $rezultat = $products->gameSearch($_REQUEST['search'] ?? '', $_REQUEST['developer_id'] ?? '0', $_REQUEST['tag_id'] ?? '0', $start_from , $items_per_page );
        $model['products'] = $rezultat[0];
        for ($i=0; $i < count($model['products']); $i++) { 
            $model['products'][$i]['description'] = (strlen($model['products'][$i]['description']) > 100 ? substr_replace($model['products'][$i]['description'], "...READ MORE", 100) : $model['products'][$i]['description']);
        }
        $model['tags'] = $tags->all();
        $model['developers'] = $developers->all();
        $model['total_pages']= ceil( $rezultat[1]/ $items_per_page );
        $model['current_page'] = $current_page;

        return json_encode($model);
    }

    public function productDetails()
    {
       $products = new ProductModel();

       $model['codes'] = $products->fetchCodes((int)$_REQUEST['game_id']);
       $model['developers_and_tags'] = $products->fetchGameDevsAndTags((int)$_REQUEST['game_id']);
        
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