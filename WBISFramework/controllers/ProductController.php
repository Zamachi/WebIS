<?php
namespace app\controllers;

use app\core\Controller;
use app\models\ProductModel;

class ProductController extends Controller{

    public function products()
    {
        $model = new ProductModel();

        //TODO: napraviti telo funkcije

        return $this->view("products","main",$model);
    }
    public function athorize()
    {
        
    }
}