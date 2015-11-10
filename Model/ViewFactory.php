<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/6/15
 * Time: 11:37 AM
 */

namespace Model;

class ViewFactory
{
    public function __construct () {

    }
    public function create ($viewName)
    {
        //prinde-te in ce context esti
        $context = '';
        if ($context == 'html') {
            return new \View\HTMLView($viewName);
        } else {
                return new \View\JSONView($viewName);
            }
    }
}