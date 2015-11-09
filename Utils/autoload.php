<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/5/15
 * Time: 2:28 PM
 */
<<<<<<< HEAD
namespace Autoload;
function __autoload($class_name) {
    include '../Model/' . $class_name . '.php';
=======

namespace Autoload;

class Autoload
{
    function __autoload($class_name)
    {
        include '../Model/' . $class_name . '.php';
    }
>>>>>>> 81ca194eb7895f2115b148567c91fe896cd0f1c6
}
