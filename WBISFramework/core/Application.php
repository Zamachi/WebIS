<?php   

namespace app\core;

use app\core\Router;
use app\core\Session;
use app\core\Response;

class Application 
{
    
    public Router $ruter;
    public Session $session;
    public Response $response;
    public Images $image;
    public static $rootDir;
    public static Application $app;
    public function __construct($rootDir)
    {
        $this->ruter = new Router();
        $this->session = new Session();
        $this->response = new Response();
        $this->image = new Images();
        self::$rootDir = $rootDir;
        self::$app = $this;
    }
    public function run(){
        echo $this->ruter->resolve();
    }
}


?>