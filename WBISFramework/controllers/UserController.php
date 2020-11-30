<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\models\UserModel;
use app\models\CodesModel;
use app\models\UserUpdateModel;

class UserController extends Controller
{

    public function profile()
    {

        $model = [];
        $userModel = new UserModel();
        //  $model = new UserModel();

        // $user = Application::$app->session->getAuth('user');

        // $dbData = $model->readAllUserData($user->{'mail'});

        $model['checkouts'] = $userModel->getCheckoutHistory((int)Application::$app->session->getAuth('user')->user_id);
        
        return $this->view("profile", "main", $model);
    }

    public function uploadCodeProcess()
    {
        $model = new CodesModel();

        $podaci = $this->getZahtev()->all();
        $podaci['code'] = strtoupper($podaci['code']);
        $podaci['user_id'] = Application::$app->session->getAuth('user')->user_id;
        $model->loadData($podaci);
        $model->validate();
        if ($model->greske === null) {
            if ($model->create()) {
                Application::$app->session->setFlash('success', "Uspesno dodat kod!");
                Application::$app->response->redirect("/profile");
            }
        }

        Application::$app->session->setFlash('profileErrors', $model->greske);
        Application::$app->response->redirect("/profile");
    }

    public function profileUpdateProcess()
    {
        if (empty($_POST['mail']) && empty($_POST['password']) && !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
            Application::$app->session->setFlash('errorsUpdate', 'You have to change at least one field!');
            Application::$app->response->redirect("/profile");
            exit;
        }
        $model = new UserUpdateModel();
        $data = $this->zahtev->all();
        $model->loadData($data);
        $model->avatar = "." . strtolower(pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION));

        $model->validate();

        if ($model->greske === null) {
            if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
                $imageFile = $_FILES['fileToUpload'];
                $imageType = strtolower($_FILES['fileToUpload']['type']);
                if (!$imageFile = Application::$app->image->imageUpload($imageFile, $imageType)) {
                    Application::$app->session->setFlash('errorsUpdate', 'Error whilst uploading the file');
                    Application::$app->response->redirect("/profile");
                }
                $model->avatar = $imageFile['name'];
            } else {
                $model->avatar = '';
            }
            if ($noviPodaci = $model->updateUser($model, $_SESSION['user']->user_id)) {
                $_SESSION['user']->avatar = $noviPodaci['avatar'];
                $_SESSION['user']->mail = $noviPodaci['mail'];
                Application::$app->session->setFlash('success', "Successfully updated your data");
                Application::$app->response->redirect("/profile");
            }
        }

        Application::$app->session->setFlash('errorsUpdate', $model->greske);
        Application::$app->response->redirect("/profile");
    }

    public function getNumberOfActives()
    {
        $roles = ['SuperAdmin'];
        $user = Application::$app->session->getAuth('user');
        $this->checkRole($roles, $user);

        $users = new UserModel();

        return json_encode($users->getNumberOfActives());
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
