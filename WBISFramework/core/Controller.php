<?php

use app\core\Router;
namespace app\core;

class Controller
{
    
    private static Router $ruter;
    private DBConnection $konekcija;
    public Request $zahtev;
    public function __construct() {
        self::$ruter = new Router();
        $this->konekcija = new DBConnection();
        $this->zahtev = new Request();
    }

    /**
     * Get the value of ruter
     */ 
    public function getRuter()
    {
        return self::$ruter;
    }

    public function view($view,$layout,$model=null)
    {
        return self::$ruter->renderView($view,$layout,$model);
    }
    /**
     * Get the value of konekcija
     */ 
    public function getKonekcija()
    {
        return $this->konekcija;
    }

    /**
     * Get the value of zahtev
     */ 
    public function getZahtev()
    {
        return $this->zahtev;
    }
}
