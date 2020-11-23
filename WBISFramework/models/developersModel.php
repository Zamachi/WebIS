<?php

namespace app\models;

use app\core\DBModel;

class DevelopersModel extends DBModel{

    public $developer_id;
    public $developer_name;

    public function tableName()
    {
        return "developers";
    }
    public function attributes(): array
    {
        return [
            "developer_id",
            "developer_name"

        ];
    }
  
    public function rules(): array
    {
     return [];   
    }

}