<?php


namespace asazh\mvc\core\base;

use asazh\mvc\core\base\Settings;
use asazh\mvc\core\base\view\errorVIew;

class Router
{
    static private $_instance;

    static private $routes;

    static public function getInstance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }return self::$_instance = new self;
    }

    private function __construct(){
        self::$routes = Settings::getInstance()->getRoutes();
    }

private function match(){
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        foreach (self::$routes as $name => $params){
            if (!isset($url[1])){
                foreach (self::$routes['']['actions'] as $action){
                    if ($action === $url[0]){
                        return [
                            'module' => self::$routes['']['module'],
                            'controller' => self::$routes['']['controller'],
                            'action' => $action
                        ];
                    }
                }
            }
            if ($name === $url[0]){
                $module = $params['module'];
                $actions = $params['actions'];
                $controller = $params['controller'];

                if (!isset($url[1])){
                    return ['module' => $module,
                        'controller' => $controller,
                        'action' => 'default'
                    ];
                }
                else{
                    foreach ($actions as $action){
                        if ($action === $url[1]){
                            return ['module' => $module,
                                    'controller' => $controller,
                                    'action' => $action
                                ];
                        }

                    }return 'Action not founded';
                }
            }
        }
        return 'Controller not founded';

    }

    public function run(){
        $match = $this->match();
        if(is_array($match)){
            list('module' => $module, 'controller' => $controller, 'action' => $action) = $match;
            $controllerPath = implode('\\', [CLASS_PATH, $module, 'controller', $controller]);
            if (class_exists($controllerPath)){
                $action = $action . 'Action';
                $controllerPath::getInstance($module)->$action();
            }else{
                errorVIew::getInstance()->error(404);
                exit();
            }}
        else{
            errorVIew::getInstance()->error(404);
            exit();
        }
    }

}