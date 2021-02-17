<?php


namespace asazh\mvc\core\base\view;


abstract class View
{
    static protected $_instance;
    static protected $module;

    protected function __clone(){}
    protected function __wakeup(){}
    protected function __sleep(){}

    protected function __construct($module){
        self::$module = $module;
    }
    static public function getInstance($module){
        if (self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new static($module);
    }

    public function render($action, $context = []){
        extract($context);
        ob_start();
        include implode('/', [TEMPLATE_PATH, self::$module, $action]).'.php';
        $content = ob_get_clean();
        include BASE_TEMPLATE_PATH;
        exit();
    }


}