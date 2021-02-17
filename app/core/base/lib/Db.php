<?php


namespace asazh\mvc\core\base\lib;

use mysql_xdevapi\Session;
use PDO;

class Db
{   static private $_instance;
    static private $db;

    private function __sleep(){}
    private function __wakeup(){}
    private function __clone(){}

    private function __construct(){
        extract(DB_CONN);
        self::$db = new PDO('mysql:host='.$host.';dbname='.$name, $user, $pass);
    }


    static public function getInstance(){
        if (self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new static();
    }

    private function query($sql, $params = []){
        $stmt = self::$db->prepare($sql);
        if(!empty($params)){
            foreach ($params as $key => $val){
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = []){
        return $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function column($sql, $params = [], $col = 0){
        return $this->query($sql, $params)->fetchColumn($col);
    }
}