<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/11/15
 * Time: 10:29 AM
 */
namespace Album\Model\Filter;

use Zend\Filter\AbstractFilter;

class HelloWorldFilter extends AbstractFilter
{
    public function filter($value)
    {
//        $value='test';
        \Zend\Debug\Debug::dump($value);
    //        die('');
        return $value;
    }

}