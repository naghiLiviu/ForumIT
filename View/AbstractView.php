<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/6/15
 * Time: 2:54 PM
 */
namespace View;

abstract class AbstractView implements ViewInterface
{
    protected $vars;
    protected $viewName;

    public function __construct($viewName)
    {
        $this->viewName = $viewName;
    }

    public function addVariables($vars)
    {
        $this->vars = $vars;
    }

    abstract  public function render();

}