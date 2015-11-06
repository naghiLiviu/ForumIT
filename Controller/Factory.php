<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/6/15
 * Time: 11:37 AM
 */

namespace Factory;
use Autoload;
class ViewFactory
{
    public function __construct () {

    }
    public function create ($viewName)
    {
        //prinde-te in ce context esti
        $context = '';
        if ($context == 'html') {
            return new \HTMLView($viewName);
        } else {
                return new \JSONView($viewName);
            }
    }
}