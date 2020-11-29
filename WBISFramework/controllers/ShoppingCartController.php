<?php 

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\CartModel;

class ShoppingCartController extends Controller{

    public function cart()
    {
        $model = new CartModel();
        return $this->view("shoppingCart","main",$model);
    }

    public function addToCart()
    {
       
        if( !Application::$app->session->getCart("". $_POST['code_id']). ""){
            Application::$app->session->setCart("".$_POST['code_id']."",$_POST['image']);
            Application::$app->session->setCart("".$_POST['code_id']."",$_POST['title']);
            Application::$app->session->setCart("".$_POST['code_id']."",$_POST['code_id']);
            Application::$app->session->setCart("".$_POST['code_id']."",$_POST['price']);
        }
       
    }

    public function deleteCart()
    {
        if( Application::$app->session->getCart($_GET['code_id']) ){
            Application::$app->session->deleteCart($_GET['code_id']);
        }

        return $this->view("shoppingCart","main");
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