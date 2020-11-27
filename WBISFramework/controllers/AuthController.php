<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\models\LoginModel;
use app\models\RegisterModel;
use app\models\UserModel;

class AuthController extends Controller
{

    public function login()
    {
        $model = new LoginModel();

        return $this->view("login", "auth", $model);
    }

    public function loginProcess()
    {
        $model = new LoginModel();
        $userModel = new UserModel();

        $model->loadData($this->zahtev->all());

        $model->validate();

        if ($model->greske === null)
        {
            if ($model->login($model))
            {
                $userData = $userModel->readAllUserData($model->mail);

                $userModel->loadData($userData);

                Application::$app->session->setAuth('user', $userModel);
                Application::$app->response->redirect("/home");
                exit;
            }
        }

        Application::$app->session->setFlash('errors', $model->greske);
        Application::$app->session->setFlash('errorUser', "Polja nisu validna ili parametri nisu tacni!");
        Application::$app->response->redirect("/login");
    }

    public function register()
    {
        $model = new RegisterModel();

        return $this->view("register", "auth",$model);
    }

    public function registerProcess()
    {
        $model = new RegisterModel();

        $data = $this->zahtev->all();

        $model->loadData($data);

        $model->validate();

        if ($model->greske === null)
        {
            if ($model->register($model)){
                Application::$app->session->setFlash('success', "Thank you for registration");
                Application::$app->response->redirect("/register");
            }
        }

        Application::$app->session->setFlash('errors', $model->greske);
        Application::$app->response->redirect("/register");
    }

    public function logout()
    {
        if (Application::$app->session->getAuth('user'))
            Application::$app->session->remove('user');

        Application::$app->response->redirect("/home");
    }

    public function accessDenied()
    {
        echo $this->view("accessDenied", "main", null);
    }

    public function athorize()
    {
        return [
          "Guest"
        ];
    }
}
