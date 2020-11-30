<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\CartModel;
use app\models\CheckoutModel;
use app\models\CodesModel;
use app\models\UserModel;

class ShoppingCartController extends Controller
{

    public function cart()
    {
        
        return $this->view("shoppingCart", "main");
    }

    public function addToCart()
    {

        if (!Application::$app->session->getCart("" . $_POST['code_id']) . "") {
            Application::$app->session->setCart("" . $_POST['code_id'] . "", $_POST['image']);
            Application::$app->session->setCart("" . $_POST['code_id'] . "", $_POST['title']);
            Application::$app->session->setCart("" . $_POST['code_id'] . "", $_POST['code_id']);
            Application::$app->session->setCart("" . $_POST['code_id'] . "", $_POST['price']);
        }
    }

    public function deleteCart()
    {
        if (Application::$app->session->getCart($_GET['code_id'])) {
            Application::$app->session->deleteCart($_GET['code_id']);
        }

        return $this->view("shoppingCart", "main");
    }

    public function checkout()
    {

        $roles = ['User','Admin','SuperAdmin'];
        $user = Application::$app->session->getAuth('user');
        $this->checkRole($roles, $user);

        if($_SESSION['totalSumCart'] > $_SESSION['user']->account_balance){
            Application::$app->session->setFlash('checkoutError', "You do not have enough resources on your account to perform this transaction. Please, remove the items from your cart, or add funds to your account.");
            Application::$app->response->redirect("/shoppingCart");
            exit;
        }
        if(count($_SESSION['cart']) === 0){
            Application::$app->session->setFlash('checkoutError', "Cart is empty.");
            Application::$app->response->redirect("/shoppingCart");
            exit;
        }
        $model = new CheckoutModel();
        $codeModel = new CodesModel();
        $userModel = new UserModel();
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $data['code_id'] = $item[2];
                $data['user_id'] = Application::$app->session->getAuth('user')->user_id;
                $model->loadData($data);
                $codeModel->updateOne('is_sold',1,'code_id',$model->code_id);
                $model->create();
                $userModel->updateOne('account_balance',"account_balance - ".$item[3]."",'user_id',$model->user_id);
                $_SESSION['user']->account_balance = $userModel->one("user_id = ". $model->user_id."")['account_balance'];
                Application::$app->session->deleteCart($model->code_id);
                unset($_SESSION['totalSumCart']);
            }
        }
        return $this->view("shoppingCart", "main");
    }

    public function athorize()
    {
        return [
            'Guest',
            'User',
            'Admin',
            'SuperAdmin'
        ];
    }
}
