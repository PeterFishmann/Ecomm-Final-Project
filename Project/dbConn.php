<?php
class Model{
    protected static $_conn = null;

    public function __construct(){
        if(self::$_conn == null){
            $host = 'localhost';
            $dbname = 'db_project';
            $user = 'root';
            $password = '';
            self::$_conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
        }
    }
}



?>