<?php   

namespace app\core;

class Application 
{
    
    public Router $ruter;
    public static $rootDir;
    public function __construct($rootDir)
    {
        $this->ruter = new Router();
        self::$rootDir = $rootDir;
    }
    public function run(){
        echo $this->ruter->resolve();
    }
}


?>