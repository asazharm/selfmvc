<?php


namespace asazh\mvc\core\base\model;


use asazh\mvc\core\base\lib\Db;

abstract class Model
{
    static protected $_instance;
    static protected $db;

    protected function __sleep(){}
    protected function __wakeup(){}
    protected function __clone(){}
    protected function __construct(){
        self::$db = Db::getInstance();
    }

    static public function getInstance(){
        if (self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new static();
    }
}