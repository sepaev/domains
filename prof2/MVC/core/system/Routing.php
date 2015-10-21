<?php

/**
 * Created by PhpStorm.
 * User: PSV
 * Date: 01.09.15
 * Time: 19:20
 */
namespace core\system;

class Routing
{
    public function loadPage()
    {
        $path = $this->getPath();
        if (!$path[0]) $path[0] = "Main";
        $className = "\\core\\components\\controller\\" . ucfirst($path[0]);
        if (class_exists($className)) {
            $obj = new $className;
            if (!$path[1]) $path[1] = "index";
            $methodName = $path[1];
            if (method_exists($obj, $methodName) || method_exists($obj, "__call")) {
                $obj->$methodName();
            } else {
                echo "404";
                die();
            }
        } else {
            echo "404";
            die();
        }


    }

    private function getPath()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = preg_replace("/\?.*$/Uis", "", $uri);
        $path = explode("/", $uri);

        $result[] = $path[2];
        $result[] = $path[3];
        $result[] = array_slice($path, 4);
        return $result;
    }
}