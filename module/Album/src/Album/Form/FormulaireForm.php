<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 12/10/15
 * Time: 2:20 PM
 */
namespace Album\Form;



class FormulaireForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('ContactDetail');

        $this->add(array(
            'name' => 'Id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'FirstName',
            'type' => 'Text',
            'options' => array(
                'label' => 'First Name',
            ),
        ));
        $this->add(array(
            'name' => 'LastName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Last Name',
            ),
        ));
        $this->add(array(
            'name' => 'PhoneNumber',
            'type' => 'Text',
            'options' => array(
                'label' => 'Phone Number',
            ),
        ));
        $this->add(array(
            'name' => 'City',
            'type' => 'Text',
            'options' => array(
                'label' => 'City',
            ),
        ));
        $this->add(array(
            'name' => 'Street',
            'type' => 'Text',
            'options' => array(
                'label' => 'Street',
            ),
        ));
        $this->add(array(
            'name' => 'NumberStreet',
            'type' => 'Text',
            'options' => array(
                'label' => 'NumberStreet',
            ),
        ));
    }
}
