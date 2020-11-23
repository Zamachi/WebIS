<?php

namespace app\controllers;

use app\core\Router;
use app\core\Controller;

class HomeController extends Controller
{
   
    public function dashboard()
    {
       $params = [];

       $result = $this->getKonekcija()->conn()->query(
        " SELECT * FROM `games` ORDER BY `publish_date` DESC LIMIT 3;
       ");

        while($red = $result->fetch_assoc()){
            array_push($params,$red);
        }

        return $this->view("home","main",$params);
    }
    
    public function athorize()
    {
        return [
            'Guest',
            'User',
            'Admin',
            'SuperAdmin',

        ];
    }
}
