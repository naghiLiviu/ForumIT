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
    public function create ($viewName, $variables)
    {
        if (php_sapi_name() == 'cli') {
            $view = new \View\JSONView($viewName);
            $view->addVariables($variables);
        } else {
            $view = new \View\HTMLView($viewName);
            $view->addVariables($variables);
        }
        return $view;
    }
}