<?php

use app\core\Router;
namespace app\core;

class Controller
{
    
    private static Router $ruter;
    public function __construct() {
        self::$ruter = new Router();
    }

    /**
     * Get the value of ruter
     */ 
    public function getRuter()
    {
        return self::$ruter;
    }

    public function view($view,$layout,$params=null)
    {
        return self::$ruter->renderView($view,$layout,$params);
    }
}
