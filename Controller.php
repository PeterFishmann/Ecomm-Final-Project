<?php
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


?>