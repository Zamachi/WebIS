<?php 

namespace app\models;

use app\core\DBModel;

class CheckoutModel extends DBModel 
{
    public $user_id;
    public $code_id;

    public function tableName()
    {
        return 'checkouts';
    }
    public function attributes(): array
    {
        return [
            'user_id',
            'code_id' 
        ];
    }
    public function rules():array
    {
     return [];   
    }


}
