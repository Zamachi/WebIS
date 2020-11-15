<?php 

namespace app\controllers;

use app\core\Controller;

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
        return $this->view("register","auth");
    }

    public function registerProcess()
    {
        # code...
    }


}
