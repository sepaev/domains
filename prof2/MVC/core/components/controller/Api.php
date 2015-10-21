<?php
/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 10.09.15
 * Time: 19:03
 */

namespace core\components\controller;


class Api
{
    private $result;
//
//    function __call($methodName, $args){
//        $request = $this->getPath();
//        $this->result = $request[0]->$request[1]();
//    }
    function __destruct()
    {
        if ($this->result) {
            echo json_encode($this->result);
        }
    }

    private function getPath()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = preg_replace("/\?.*$/Uis", "", $uri);
        $uri = explode("/", $uri);
        if (!$uri[4]) {$className = "Main";} else{$className = $uri[4];}
        $className = "\\core\\components\\model\\" . ucfirst($className);
        if (class_exists($className)) {
            $obj = new $className;
            $methodName = $uri[3].$uri[5];
            if (method_exists($obj, $methodName)) {
                return [$obj,$methodName];
            } else {
                echo "404";
            }
        } else {
            echo "404";
            die();
        }
    }

    public function get()
    {
        $request = $this->getPath();
        if ($request) {
            $this->result = $request[0]->$request[1]();
        }
    }
    public function put()
    {
        $request = $this->getPath();
        if ($request) {
            $this->result = $request[0]->$request[1]();
        }
    }
    public function delete()
    {
        $request = $this->getPath();
        if ($request) {
            $this->result = $request[0]->$request[1]();
        }
    }
    public function update()
    {
        $request = $this->getPath();
        if ($request) {
            $this->result = $request[0]->$request[1]();
        }
    }

}