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

        $callback = $this->rute[$method][$path] ?? false;
        if(!$callback){
            
            http_response_code(404);
            return $this->renderView("notFound",'main',null);
        }
        if (is_string($callback)) {
            // var_dump($callback);
            return $this->renderView($callback, 'main');
        }
        if (is_array($callback))
        {
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback);

    }

    public function renderView($view,$layout,$params=null)
    {
        
        $onlyView = $this->renderOnlyView($view,$params);
        $layout = $this->layoutContent($layout);

        return str_replace("{{ renderSection }}",$onlyView,$layout);
    }

    public function layoutContent($layout)
    {
        ob_start();
        include_once Application::$rootDir . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view,$params=null)
    {
        if($params!=null){

            foreach ($params as $key => $value) {
                $$key = $value;
            }
            
        }
        ob_start();
        include_once Application::$rootDir . "/views/$view.php";
        return ob_get_clean();
    }

   

}


?>