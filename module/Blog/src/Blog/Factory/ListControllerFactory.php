<?php
/**
 * Created by PhpStorm.
 * User: isabela
<<<<<<< HEAD
 * Date: 11/26/15
 * Time: 1:34 PM
 */

namespace Blog\Factory;

use Blog\Controller\ListController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $postService        = $realServiceLocator->get('Blog\Service\PostServiceInterface');

        return new ListController($postService);
    }
}

