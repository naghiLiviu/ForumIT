<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/5/15
 * Time: 2:28 PM
 */


function __autoload($class_name)
{
    //echo $class_name;
    if(strstr($class_name, '\\')) {
        $classPath = '../' . $class_name . '.php';
        $classPath = str_replace('\\', '/', $classPath);
        if(file_exists($classPath)) {
            require_once $classPath;
        }
    }
}

