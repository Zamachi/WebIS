<?php

namespace app\controllers;

use app\core\Controller;
use app\models\UserModel;

class AdministrationController extends Controller
{

    public function adminPanel(){

        $model = new UserModel();
        $dbData = $model->all();

        return $this->view("adminPanel","main",$dbData);
    }  

    public function reports(){
        $model = ["nesto"];

        return $this->view("reports","main",$model);
    }    

    public function athorize(){
        return [
            "Admin",
            "SuperAdmin"
        ];
    }
}
