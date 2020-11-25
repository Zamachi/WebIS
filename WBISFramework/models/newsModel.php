<?php


namespace app\models;


use app\core\DBModel;

class NewsModel extends DBModel
{
    public string $title = '';
    public string $description = '';

    public function tableName()
    {
        return "users"; //nisam sigurna sta ovde treba da stoji
    }

    public function attributes(): array
    {
        return [
            'title',
            'description'
        ];
    }

    /*
    public function rules(): array
    {
        return [
            'mail' => [self::RULE_EMAIL, self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    */

    public function labels(): array
    {
        return [
            'title' => "Enter your title",
            'description' => "Enter your description"
        ];
    }

    public function news(NewsModel $model)
    {
        $modelDB = new NewsModel();

        $modelDB->loadData($model->one("title = '$model->title';")); //nije dovrseno

        /*
        if ($modelDB !== null)
        {
            if (password_verify($model->password, $modelDB->password)){
                return true;
            }
        }

        return false;
        */
    }
}