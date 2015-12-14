<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/27/15
 * Time: 11:36 AM
 */
namespace Album\Controller;

class C
{
    protected $b = null;

    public function __construct(B $b)
    {
        $this->b=$b;
    }

    public function getPassword()
    {
        return 'string';
    }
}
