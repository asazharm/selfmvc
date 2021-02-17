<?php


namespace asazh\mvc\core\main\controller;

use asazh\mvc\core\base\controller\Controller;

class MainController extends Controller
{
    public function contactsAction(){
        self::$view->render('contacts');
    }
    public function defaultAction(){
        self::$view->render('default');
    }
}