<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/6/15
 * Time: 2:54 PM
 */
use View\ViewInterface;
abstract class AbstractView implements ViewInterface
{
    protected $vars;

    public function addVariables($vars)
    {
        $this->vars = $vars;
    }

    abstract  public function render($viewName);

}