<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/24/15
 * Time: 3:35 PM
 */

namespace Album\Controller;


use Zend\EventManager\EventManagerInterface;

class Buzzer
{
    public function buzz()
    {
        return 'Buzz';
    }
}

class BuzzDelegator extends Buzzer
{
    protected $realBuzzer;
    protected $eventManager;

    public function __construct(Buzzer $realBuzzer, EventManagerInterface $eventManager)
    {
        $this->realBuzzer = $realBuzzer;
        $this->eventManager = $eventManager;
    }

    public function buzz()
    {
        $this->eventManager->trigger('buzz', $this);

        return $this->realBuzzer->buzz();
    }

}
