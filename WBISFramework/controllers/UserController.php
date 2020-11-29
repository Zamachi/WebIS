<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\models\CodesModel;
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

    public function uploadCodeProcess(){
        $model = new CodesModel();

        $podaci = $this->getZahtev()->all();
        $podaci['code'] = strtoupper($podaci['code']);
        $podaci['user_id'] = Application::$app->session->getAuth('user')->user_id;
        $model->loadData($podaci);
        $model->validate();
        if ($model->greske === null) {
            if ($model->create()) {
                Application::$app->session->setFlash('success', "Uspesno dodat kod!");
                return $this->view("profile","main",$model);
            }
        }

        Application::$app->session->setFlash('profileErrors', $model->greske);
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
