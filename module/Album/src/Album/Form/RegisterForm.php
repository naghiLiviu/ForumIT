<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/4/15
 * Time: 11:14 AM
 */

namespace Album\Form;

//include_once 'RegisterFormValidator.php';
use Album\Model\Filter\HelloWorldFilter;
use Zend\EventManager\FilterChain;
use Zend\Form\Element\Hidden;
use Zend\Form\Form;
use Zend\Validator;
use Zend\Filter;
use Zend\View\Model\ViewModel;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class RegisterForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('album');
        $this->add(array(
            'name' => 'username',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Username',
            ),
            'attributes' => array(
                'placeholder' => 'Insert your username',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'placeholder' => 'Insert your email',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'placeholder' => 'Insert your password',
            ),
        ));
        $this->add(array(
            'name' => 'confirmPassword',
            'type' => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Confirm Password',
            ),
            'attributes' => array(
                'placeholder' => 'Retype password',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

        $this->add(array(
            'name' => 'date',
            'type' => 'Zend\Form\Element\Date',
            'options' => array(
                'label' => 'Date',
            ),
        ));

        $this->add(array(
            'name' => 'dropdown',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Select Theme',
            ),
            'attributes' => array(
                'options' => array(
                    '1' => '...',
                    '2' => 'White',
                    '3' => 'Black',
                    '4' => 'Red',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'checkbox',
            'type' => 'Zend\Form\Element\Checkbox',
            'options' => array(
                'label' => 'I agree',
            ),
        ));

        $myField = new Hidden();
        $myField->setName('my-hidden-field');
        $myField->setValue('  traala@trilili.com');
        $this->add($myField);
//        $this->add(array(
//            'spec' => array(
//                'name' => 'captcha',
//                'type' => 'Zend\Form\Element\Captcha',
//                'options' => array(
//                    'label' => 'Please verify you are human.',
//                    'captcha' => array(
//                        'class' => 'Dumb',
//                    ),
//                ),
//            ),
//        ));
    }

    /*public function isValid()
    {
        if ($_POST) {
            $validatorUsername = new Validator\StringLength(6);

            $validatorUsername->setMessage('The value you have just entered is to short; it must be at least 6 digits.');

            if (!$validatorUsername->isValid($_POST['username'])) {
                $message = $validatorUsername->getMessages();
                echo current($message);
                return false;
            }
//                return true;
//            }

            $validatorPassword = new Validator\StringLength(8);
            $regex = '^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$';

//    $validatorPassword->setMessage('Password must be at least 8 digits long');
            if (!$validatorPassword->isValid($_POST['password'])) {

//        $message = $validatorPassword->getMessages();
//        echo current($message);
                echo '!minim';
                return false;
            } else {
                $regexValidator = new Validator\Regex(array('pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/'));

                if (!$regexValidator->isValid($_POST['password'])) {
                    echo '!regex';
                    return false;
                } else {
                    if ($_POST['password'] != $_POST['confirmPassword']) {
//        $message = $validatorPassword->getMessages();
//        echo current($message);
                        echo '!match';
                        return false;
                    }

                }
            }
        }
    }*/

    public function getMyInputFilter()
    {
        /*
         * Email filter + validator
         */

        $email = new Input('username');
        $email->getValidatorChain()
            ->attach(new Validator\EmailAddress());
        $tagsFilter = new Filter\StringTrim();
        $helloWorldFilter = new HelloWorldFilter();

        $email->setValue('123test');
        //$helloWorldFilter->filter($email->getValue());
        //$email->getFilterChain()->attach($tagsFilter);
        $email->getFilterChain()->attach($helloWorldFilter);
//        \Zend\Debug\Debug::dump($helloWorldFilter);
//        \Zend\Debug\Debug::dump($email->getMessages());

        //echo '<pre>';
        //print_r($email->getFilterChain());
        //echo '</pre>';
        $inputFilter = new InputFilter();
        $inputFilter->add($email);
//        \Zend\Debug\Debug::dump($helloWorldFilter);
//        \Zend\Debug\Debug::dump($inputFilter);
/*a
 * Username filter + validator
 */
        /*$username = new Input('username');
        $username->getValidatorChain()
            ->attach(new Validator\StringLength(5));

        $upperFilter = new Filter\StringToUpper();
        $username->getFilterChain()->attach($upperFilter);
        $inputFilter->add($username);*/

/*
 * Date filter + validator
 */
        /*$dateInput = new Input('date');
        $dateInput->getValidatorChain()
            ->attach(new Validator\Date());

        $dateFilter = new Filter\DateSelect();
        $dateInput->getFilterChain()->attach($dateFilter);
        $inputFilter->add($dateInput);*/

        return $inputFilter;
    }



}