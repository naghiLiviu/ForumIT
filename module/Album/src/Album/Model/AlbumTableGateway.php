<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/24/15
 * Time: 1:57 PM
 */

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class AlbumTableGateway extends TableGateway implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;
}