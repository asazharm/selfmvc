<?php


namespace asazh\mvc\core\base\controller;

abstract class Controller
{
    static protected $_instance;
    static protected $view;
    static protected $model;

    protected function __clone(){}
    protected function __wakeup(){}
    protected function __sleep(){}


    protected function __construct($module)
    {
        self::$view = implode('\\', [CLASS_PATH, $module, 'view' , ucfirst($module.'View')])::getInstance($module);
        self::$model = implode('\\', [CLASS_PATH, $module, 'model' , ucfirst($module.'Model')])::getInstance();
    }
    static public function getInstance($module){
        if (self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new static($module);
    }
}