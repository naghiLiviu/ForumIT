<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/23/15
 * Time: 4:39 PM
 */

namespace Album\Form;

use Zend\Form\Form;
use Zend\Form\Element\Email;
use Zend\InputFilter;

class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('album');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'artist',
            'type' => 'Text',
            'options' => array(
                'label' => 'Artist',
            ),
        ));
        $this->add(array(
            'name' => 'username',
            'type' => 'Text',
            'attributes' => array('maxlength' => '12', 'size' => '32', 'type' => 'username'),
            'options' => array(
                'label' => 'Username',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',

            'attributes' => array('maxlength' => '128', 'size' => '32', 'type' => 'email'),
            'options' => array('label' => 'Email', 'appendText' => '@'),
        ));
        $this->add(array(
            'name' => 'radio',
            'type' => 'Zend\Form\Element\Radio',
            'options' => array(
                'label' => 'Do you like this ?',
                'value_options' => array(
                    'No' => 'No',
                    'Yes' => 'Yes',
                ),
            ),
        ));
        $this->add(array(
            'name' => 'comment',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array('maxlength' => '250', 'type' => 'textarea'),
            'options' => array(
                'label' => 'Please insert your comment',
            ),
        ));
        $this->add(array(
            'name' => 'fileUpload',
            'type' => 'Zend\Form\Element\File',
            'options' => array(
                'label' => 'File Upload',
            )
        ));


        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));


        //$this->addInputFilter();
    }

    public function addInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();

        // File Input
        $fileInput = new InputFilter\FileInput('fileUpload');
        $fileInput->setRequired(true);

        // You only need to define validators and filters
        // as if only one file was being uploaded. All files
        // will be run through the same validators and filters
        // automatically.
        $fileInput->getValidatorChain()
            ->attachByName('filesize',      array('max' => 2048000))
            //->attachByName('filemimetype',  array('mimeType' => 'image/png,image/x-png'))
            ->attachByName('fileimagesize', array('maxWidth' => 1000, 'maxHeight' => 1000));

        $fileInput->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target'    => './data/tmpuploads/avatar.png',
                'randomize' => true,
            )
        );
        $inputFilter->add($fileInput);

        $this->setInputFilter($inputFilter);
    }
}