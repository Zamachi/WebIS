<?php

namespace app\controllers;

use app\core\Router;
use app\core\Controller;

class HomeController extends Controller
{
   
    public function dashboard()
    {
        $params = [
            "forename" => "Stefan",
            "lastname" => "Dimitrijevic"
        ];
        return $this->view("home","main",$params);
    }
}
