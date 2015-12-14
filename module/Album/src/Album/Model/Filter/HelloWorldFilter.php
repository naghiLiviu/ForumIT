<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/11/15
 * Time: 10:29 AM
 */
namespace Album\Model\Filter;

use Zend\Filter\AbstractFilter;
use Zend\Filter\FilterInterface;

class HelloWorldFilter implements FilterInterface
{
    public function filter($value)
    {
        \Zend\Debug\Debug::dump($value);
        return $value;
    }

}