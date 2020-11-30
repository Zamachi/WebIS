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

    public function makeAdmin(){
        
    }
    public function makeSuperAdmin(){

    }
    public function banUser(){

    }

    public function makeNewsMassive()
    {
        $model = new NewsModel();

        if ($_FILES['newsJSON']['name'] !== "" and $_FILES['newsJSON'] !== null) {
            $data = file_get_contents($_FILES['newsJSON']['tmp_name']);
            $dateDecoded = json_decode($data);
            $br = 0;

            foreach ($dateDecoded as $row) {
                $model = new NewsModel();

                $model->loadData($row);

                $model->validate();

                if ($model->greske === null) {
                    $model->create($model);
                }else {
                    foreach ($model->greske as $attribute => $value) {
                        $errors[$br][$attribute] = $value;
                    }
                }
                $br++;
            }
        }

        if ($model->greske !== null) {
            Application::$app->session->setFlash('success', "Uspesno dodato!");
        }else{
            Application::$app->session->setFlash('jsonErrors', $errors);
        }

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
