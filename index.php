<?php
require "phpqrcode/qrlib.php";
require_once 'dbConn.php';
session_start();
class App{
    var $controller = 'HomeController';
    var $method = 'index';
    var $params = [];

    public function __construct(){
        $url = $this->parseURL();
        if(isset($url[0]) && file_exists('Controller/' . $url[0] . 'Controller.php')){
            $this->controller = $url[0] . 'Controller';
            unset($url[0]);
        }
        require_once 'Controller/' . $this->controller . '.php';
        $this->controller = new $this->controller();
        if(isset($url[1]) && method_exists($this->controller, $url[1])){
            $this->method = $url[1];
            unset($url[1]);
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller,$this->method], $this->params);
        
    }
    private function parseURL(){
      if(isset($_GET['url'])){
        return explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
      }  
    }
}
class Controller{
    public function model($model){
        if(file_exists('Model/' . $model . '.php')){
            require_once 'Model/' . $model . '.php';
            return new $model();
        }else{
            return null;
        }
    }
    public function view($name, $data = []){
        if(file_exists('View/' . $name . '.php')){
            include 'View/' . $name . '.php';
        }else{
            echo "Error: the view $name does not exist!";
        }
    }
}

new App();

?>