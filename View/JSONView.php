<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/6/15
 * Time: 2:59 PM
 */
namespace View;

class JSONView extends AbstractView
{
    public function render()
    {
        $result = json_encode($this->vars);

        return $result;
        //code that takes the vars and spits them out as json
    }

}