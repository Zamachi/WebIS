<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\models\NewsModel;
use app\models\UserModel;

class AdministrationController extends Controller
{

    public function adminPanel()
    {

        $model = new UserModel();
        $dbData = $model->all();

        return $this->view("adminPanel", "main", $dbData);
    }

    public function reports()
    {
        $model = ["nesto"];

        return $this->view("reports", "main", $model);
    }

    public function makeNews()
    {
        $model = new NewsModel();
        $data = $this->zahtev->all();
       // var_dump($this->zahtev->all());
        $model->loadData($data);
        $model->news_image = "." . strtolower(pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION));

        if (is_uploaded_file($_FILES['news_image']['tmp_name'])) {
            $imageFile = $_FILES['news_image'];
            $imageType = strtolower($_FILES['news_image']['type']);
            if (!$imageFile = Application::$app->image->imageUploadNews($imageFile, $imageType)) {
                Application::$app->session->setFlash('errorsNews', 'Error whilst uploading the file');
                Application::$app->response->redirect("/adminPanel");
            }
            $model->news_image = "/news/" . $imageFile['name'];
        } else {
            $model->news_image = '';
        }
        // var_dump($model);
        // exit;
        if ($model->create()) {
            Application::$app->session->setFlash('success', "Successfully updated your data");
            Application::$app->response->redirect("/adminPanel");
        }


        Application::$app->session->setFlash('errorsNews', $model->greske);
        Application::$app->response->redirect("/adminPanel");
    }

    public function athorize()
    {
        return [
            "Admin",
            "SuperAdmin"
        ];
    }
}
