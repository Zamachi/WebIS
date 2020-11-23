<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\cartModel;

class ShoppingCartController extends Controller{

    public function cart()
    {
        $model = new cartModel();
        return $this->view("shoppingCart","main",$model);
    }

    public function athorize()
    {
        return [
            'User',
            'Admin',
            'SuperAdmin'
        ];
    }
}