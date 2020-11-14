<?php   
namespace app\core;
class Router 
{
    public Request $request;
    public array $rute = [];
    public function __construct() {
        $this->request = new Request();
    }
    
    public function get($path,$callback){
        
        $this->rute['get'][$path] = $callback;
    }

    public function post($path,$callback){
        $this->rute['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        // var_dump($path);
        // var_dump($method);

        $callback = $this->rute[$method][$path] ?? false;
        if(!$callback){
            
            http_response_code(404);
            return $this->renderView("notFound",'main');
        }
        if (is_string($callback)) {
            // var_dump($callback);
            return $this->renderView($callback, 'main');
        }
        if(is_array($callback)){

        }
        if ($rezultat = call_user_func($callback))
            return $rezultat;

    }

    public function renderView($view,$layout)
    {
        
        $onlyView = $this->renderOnlyView($view);
        $layout = $this->layoutContent($layout);

        return str_replace("{{ renderSection }}",$onlyView,$layout);
    }

    public function layoutContent($layout)
    {
        ob_start();
        include_once Application::$rootDir . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$rootDir . "/views/$view.php";
        return ob_get_clean();
    }

   

}


?>