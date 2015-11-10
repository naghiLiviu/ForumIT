<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/6/15
 * Time: 2:50 PM
 */
namespace View;

class HTMLView extends AbstractView
{
    public function render($viewName)
    {
        extract($this->vars);
        //code that gets the right html file and includes it
    }
}
