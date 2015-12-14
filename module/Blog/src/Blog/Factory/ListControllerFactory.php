<?php
/**
 * Created by PhpStorm.
 * User: isabela
<<<<<<< HEAD
 * Date: 11/26/15
 * Time: 1:34 PM
 */
=======
 * Date: 11/25/15
 * Time: 4:02 PM
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
>>>>>>> 1f6c5c2280ca89195f98dfb7fed1fb921e8fc643
