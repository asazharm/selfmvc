<?php


namespace asazh\mvc\core\admin\controller;
use asazh\mvc\core\base\controller\Controller;
use asazh\mvc\core\base\lib\Db;

class AdminController extends Controller
{

    public function loginAction(){

        $context = [
        ];
        self::$view->render('login', $context);
    }

    public function registerAction(){
        $context = [
        ];
        self::$view->render('register', $context);
    }
    public function defaultAction(){
        $context = [
        ];
        self::$view->render('default', $context);
    }
}
