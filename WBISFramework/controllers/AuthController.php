<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller{
    
    public function login()
    {
        return $this->view("login","auth");
    }

    public function loginProcess()
    {
        # code...
    }

    public function register()
    {
        $parametri = $this->getZahtev()->all();
        $mail = $this->getZahtev()->getOne("mail");

        return $this->view("register","auth");
    }

    public function registerProcess()
    {
        $model = new RegisterModel();

        // $model->mail = $this->zahtev->getOne("mail");
        // $model->password = $this->zahtev->getOne("password");
        // $model->confirmPassword = $this->zahtev->getOne("confirmPassword");
        // $model->datumRodjenja = $this->zahtev->getOne("datumRodjenja");
        // $model->country = $this->zahtev->getOne("country");
        //TODO: moramo automatizovati ovo dohvatanje promenljivih
        
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
        
        return $this->view("register","auth",$model);
    }


}
