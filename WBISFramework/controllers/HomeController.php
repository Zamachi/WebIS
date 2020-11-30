<?php

namespace app\controllers;

use app\core\Router;
use app\core\Controller;
use app\models\NewsModel;
use app\models\ProductModel;

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

        $novosti = new NewsModel();
        $topIgre = new ProductModel();

        $model['igre'] = $params;
        $model['novosti'] = $novosti->getFirstFiveNews();
        $model['top4'] = $topIgre->getTop4Games();
        return $this->view("home","main",$model);
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
