<?php

namespace app\models;

use app\core\DBModel;

class NewsModel extends DBModel
{
   public $news_title;
   public $news_image;
   public $news_content;
   

    public function tableName()
    {
        return "news";
    }
    public function attributes(): array
    {
        return [
            "news_title",
            "news_image",            
            "news_content"
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
    public function getFirstFiveNews()
    {
        $tableName = $this->tableName();

        $db = $this->dbConnection->conn();

        $sqlString = "SELECT * FROM $tableName ORDER BY `date_created` DESC LIMIT 5;";

        $dataResult = $db->query($sqlString) or die();
        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }
}
