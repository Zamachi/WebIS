<?php   

namespace app\core;

class Application 
{
    
    public Router $ruter;
    public Session $session;
    public Response $response;
    public static $rootDir;
    public static Application $app;
    public function __construct($rootDir)
    {
        $this->ruter = new Router();
        $this->session = new Session();
        $this->response = new Response();
        self::$rootDir = $rootDir;
        self::$app = $this;
    }
    public function run(){
        echo $this->ruter->resolve();
    }
}


?>