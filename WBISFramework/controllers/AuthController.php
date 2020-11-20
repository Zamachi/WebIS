<?php

namespace app\controllers;

use app\core\Controller;
use app\models\LoginModel;
use app\models\RegisterModel;

class AuthController extends Controller
{

    public function login()
    {
        $model = new LoginModel();

        //TODO: logika ovde

        return $this->view("login", "auth", $model);
    }

    public function loginProcess()
    {
       return "Success!"; //TODO: logika ovde
    }

    public function register()
    {
        $model = new RegisterModel();

        return $this->view("register", "auth",$model);
    }

    public function registerProcess()
    {
        $model = new RegisterModel();

        $data = $this->zahtev->all();

        $model->loadData($data);

        $model->validate();

        //var_dump($model);

        // return "test";
        return $this->view("register", "auth", $model);
    }
}
