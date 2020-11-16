<?php

use app\core\Router;
namespace app\core;

class Controller
{
    
    private static Router $ruter;
    private DBConnection $konekcija;
    public function __construct() {
        self::$ruter = new Router();
        $this->konekcija = new DBConnection();
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
    /**
     * Get the value of konekcija
     */ 
    public function getKonekcija()
    {
        return $this->konekcija;
    }
}
