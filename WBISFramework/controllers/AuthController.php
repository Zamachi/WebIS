<?php

namespace app\controllers;

use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller
{

    public function login()
    {
        return $this->view("login", "auth");
    }

    public function loginProcess()
    {
        # code...
    }

    public function register()
    {
        $parametri = $this->getZahtev()->all();
        $mail = $this->getZahtev()->getOne("mail");

        return $this->view("register", "auth");
    }

    public function registerProcess()
    {
        $model = new RegisterModel();

        $data = $this->zahtev->all();

        $model->loadData($data);
        // if ($model->mail === '' or $model->mail === null) {
        //     $model->greske['emailEmptyError'] = "Email obavezno polje!";
        // }else if(!preg_match('/^[A-z]{1}[A-z_\d\-\.]+@[a-z]+mail\.(com|ac\.rs)$/',$model->mail)){
        //     $model->greske['emailWrongFormat'] = "Los format e-maila!";
        // }

        // if($model->password === '' or $model->password === null){
        //     $model->greske['passwordEmptyError'] = "Password je obavezno polje!";
        // }else if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{8,}$/",$model->password)){
        //     $model->greske['passwordWrongFormat'] = "Los format Passworda!";
        // }

        $model->validate();

        //     var_dump($model);

        // return "test";
        return $this->view("register", "auth", $model);
    }
}
