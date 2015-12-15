<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 11/23/15
 * Time: 1:45 PM
 */
namespace Album\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;



class Album
{

    protected $inputFilter;
    public $id;
    public $artist;
    public $title;
    public $email;
    public $username;
    public $radio;
    public $comment;
    public $language;
    public $date;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title  = (!empty($data['title'])) ? $data['title'] : null;
        $this->email  = (!empty($data['email'])) ? $data['email'] : null;
        $this->username  = (!empty($data['username'])) ? $data['username'] : null;
        $this->radio  = (!empty($data['radio'])) ? $data['radio'] : null;
        $this->comment  = (!empty($data['comment'])) ? $data['comment'] : null;
        $this->language  = (!empty($data['language'])) ? $data['language'] : null;
        $this->date  = (!empty($data['date'])) ? $data['date'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getMyInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'artist',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'title',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'type' => 'Zend\Validator\EmailAddress',
                        'options' => array(
                            'message'  => 'Invalid email address',
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'username',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),

                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 6,
                            'max'      => 15,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'language',
                'required' => true,

            ));
            $inputFilter->add(array(
                'name'     => 'radio',
                'required' => true,
            ));
//            $inputFilter->add(array(
//                'name' => 'fileUpload',
//                'required' => true,
//            ));
            $inputFilter->add(array(
                'name'     => 'comment',
                'required' => false,

                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 5,
                            'max'      => 250,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'date',
                'required' => 'true',
                'validators' => array(
                array(
                    'name' => 'date',
                    'type' => 'Zend\Form\Element\Date',
                    'options' => array(
                        'message'  => 'Invalid date: Format should be Y-m-d',
                    ),
                ),
            ),
            ));
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

}