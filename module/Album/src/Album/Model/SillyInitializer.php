<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/24/15
 * Time: 2:05 PM
 */

namespace Album\Model;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SillyInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if($instance instanceof AlbumTable) {
            $instance->sillyProperty = 'Tralalala';
        }
    }
}