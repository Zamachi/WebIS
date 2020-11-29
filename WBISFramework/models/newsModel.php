<?php

namespace app\models;

use app\core\DBModel;

class NewsModel extends DBModel
{
   public $news_title;
   public $news_image;
   public $news_content;
   public $date_created;

    public function tableName()
    {
        return "news";
    }
    public function attributes(): array
    {
        return [
            "news_title",
            "news_image",            
            "news_content",
            "date_created"
        ];
    }
    
    public function rules():array
    {
        return [
            
        ];
    }

    public function labels()
    {
       return [
           
       ];
    }

}
