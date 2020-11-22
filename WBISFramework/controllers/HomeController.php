<?php

namespace app\controllers;

use app\core\Router;
use app\core\Controller;

class HomeController extends Controller
{
   
    public function dashboard()
    {
        $params = [];
        $result = $this->getKonekcija()->conn()->query("SELECT * FROM users");

        while($red = $result->fetch_assoc()){
            array_push($params,$red);
        }

        return $this->view("home","main",$params);
    }

    public function athorize()
    {
        
    }
}
