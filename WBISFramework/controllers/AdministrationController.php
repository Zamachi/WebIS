<?php

namespace app\controllers;

use app\core\Controller;

class AdministrationController extends Controller
{

    public function adminPanel(){
        $model = ["nesto"];

        return $this->view("adminPanel","main",$model);
    }    

    public function athorize(){
        return [
            "Admin",
            "SuperAdmin"
        ];
    }
}
