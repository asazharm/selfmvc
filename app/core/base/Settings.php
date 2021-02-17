<?php

namespace asazh\mvc\core\base;

define('TEMPLATE_PATH', 'templates');
define('BASE_TEMPLATE_PATH', 'templates/base.php');
define('STATIC_PATH', '/static');
define('CLASS_PATH', 'asazh\\mvc\\core');

#your DB credentials
define('DB_CONN', [
    'name' => '',
    'host' => '',
    'user' => '',
    'pass' => ''
]);


class Settings{



    static private $routes = [
        '' => [
            'module' => 'main',
            'controller'=>'MainController',
            'actions' => ['contacts']
        ],
        'admin'=> [
            'module' => 'admin',
            'controller'=>'AdminController',
            'actions'=> ['login', 'register']
        ],
        'user' => [
            'module' => 'user',
            'controller'=>'UserController',
            'actions' => ['login', 'register']
        ]
    ];

    static private $_instance;

    private function __clone(){}

    static public function getInstance(){
        if (self::$_instance instanceof self){
            return self::$_instance;
        }else return self::$_instance = new self();
    }

    static public function getRoutes(){
        return self::$routes;
    }

}
