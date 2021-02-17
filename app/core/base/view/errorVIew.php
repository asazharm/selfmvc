<?php


namespace asazh\mvc\core\base\view;


class errorVIew
{
    static private $_instance;

    private function __clone(){}
    private function __wakeup(){}
    private function __sleep(){}
    private function __construct(){}


    static public function getInstance(){
        if (self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new static();
    }


    public function error($error){
        http_response_code($error);
        include implode('/',[TEMPLATE_PATH, 'errors', $error]).'.php';
    }
}