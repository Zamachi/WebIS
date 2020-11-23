<?php

namespace app\models;

use app\core\DBModel;

class TagsModel extends DBModel{

    public $tag_id;
    public $tag_name;

    public function tableName()
    {
        return "tags";
    }
    public function attributes(): array
    {
        return [
            "tag_id",
            "tag_name"

        ];
    }
  
    public function rules(): array
    {
     return [];   
    }
}