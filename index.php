<?php
class main
{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    
    {
        $url = $this->parseurl();
        
        //ROUTING
        if ($url[0] == ""){
            require_once 'app/controllers/home.php';
            $controller = new home;
            $controller->home();
            unset($url[0]);
        } 
        elseif($url[0] == "login"){
            require_once 'app/controllers/home.php';
            $controller = new home;
            $controller->login();
            unset($url[0]);
        } 
        elseif($url[0] == "register"){
            require_once 'app/controllers/home.php';
            $controller = new home;
            $controller->register();
            unset($url[0]);
        } 
        elseif($url[0] == "logout"){
            require_once 'app/controllers/home.php';
            $controller = new home;
            $controller->logout();
            unset($url[0]);
        } 
        else {
            if (file_exists('app/controllers/'.$url[0].'.php')) {
                $this->controller = $url[0];             
                unset($url[0]);
            } else {
                require_once 'app/controllers/home.php';
                $controller = new home;
                $controller->error404();
                unset($url[0]);
            }
        }

        require_once 'app/controllers/'.$this->controller.'.php';

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            } else{
                require_once 'app/controllers/home.php';
                $controller = new home;
                $controller->error404();
                unset($url[1]);
            }
        }

        if(!empty($url)){
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    function parseurl(){
        $url = $_SERVER['REQUEST_URI'];
        $pathArray = explode('/', parse_url($url, PHP_URL_PATH));
        $pathArray = array_slice($pathArray, 1);
        $pathArray = array_values($pathArray);
        return $pathArray;
    }


}

$run = new main;