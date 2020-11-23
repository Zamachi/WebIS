<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\CartModel;

class ShoppingCartController extends Controller{

    public function cart()
    {
        $model = new CartModel();
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