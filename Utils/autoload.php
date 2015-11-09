<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/5/15
 * Time: 2:28 PM
 */

namespace Autoload;

class Autoload
{
    function __autoload($class_name)
    {
        include '../Model/' . $class_name . '.php';
    }
}
