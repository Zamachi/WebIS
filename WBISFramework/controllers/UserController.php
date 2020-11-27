<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\models\UserModel;

class UserController extends Controller 
{
    
    public function profile()
    {
        
        $model = new UserModel();

        $user = Application::$app->session->getAuth('user');

        $dbData = $model->readAllUserData($user->{'mail'});

        $model->loadData($dbData);

        return $this->view("profile","main",$model);
    }

    public function athorize()
    {
        return [
            "User",
            "Admin",
            "SuperAdmin"

        ];
    }


}
