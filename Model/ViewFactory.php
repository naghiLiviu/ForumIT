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
        if (preg_match('/Opera/', $_SERVER['HTTP_USER_AGENT']) || preg_match('/Mozilla/', $_SERVER['HTTP_USER_AGENT'])) {
            $view = new \View\HTMLView($viewName);
        } else {
            $view = new \View\JSONView($viewName);
        }
        return $view;
    }
}