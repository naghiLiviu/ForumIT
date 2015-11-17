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
    public function render()
    {
        extract($this->vars);

        $viewPath = $this->viewName.'Template.php';
        if(file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo 'Could not locate the template file';
        }
    }
}
