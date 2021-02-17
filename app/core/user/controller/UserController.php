<?php


namespace asazh\mvc\core\user\controller;

use asazh\mvc\core\base\controller\Controller;

class UserController extends Controller
{

    public function loginAction(){
        self::$view->render('login');
    }
    public function registerAction(){
        self::$view->render('register');
    }
    public function defaultAction(){
        self::$view->render('default');
    }
}