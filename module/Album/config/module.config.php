<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 11/23/15
 * Time: 12:57 PM
 */
return array(
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
            'Album\Controller\A' => 'Album\Controller\A',
            'Album\Controller\B' => 'Album\Controller\A',
            'Album\Controller\C' => 'Album\Controller\A',
        ),
    ),
    'router' => array(
        'routes' => array(
            'album' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/album[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
    'home' => array(
        'type' => 'Zend\Mvc\Router\Http\Literal',
        'options' => array(
            'route'    => '/',
            'defaults' => array(
                'controller' => 'Application\Controller\Album',
                'action'     => 'index',
            ),
        ),
    ),
    'di' => array(
        'allowed_controllers' => array(
            'Album\Controller\A',
        )
    )
);