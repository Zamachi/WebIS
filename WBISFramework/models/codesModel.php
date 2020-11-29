<?php

namespace app\models;

use app\core\DBModel;

class CodesModel extends DBModel
{
    public string $code;
    public $game_id;
    public $is_sold=0;
    public $price;
    public $user_id;

    public function tableName()
    {
        return "codes";
    }
    public function attributes(): array
    {
        return [
            "code",
            "game_id",            
            "is_sold",
            "price",
            "user_id"
        ];
    }
    
    public function rules():array
    {
        return [
            "code" => [self::RULE_CODE, self::RULE_CODE_UNIQUE]
        ];
    }

    public function labels()
    {
       return [
           'code' => "Enter your game code:"
       ];
    }

}
