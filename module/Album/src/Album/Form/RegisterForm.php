<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/4/15
 * Time: 11:14 AM
 */

namespace Album\Form;

//include_once 'RegisterFormValidator.php';
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
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'options' => array(
                'label' => 'Email',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'name' => 'confirmPassword',
            'type' => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Confirm Password',
            ),
        ));
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Zend\Form\Element\Csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600,
                )
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

    public function getInputFilter()
    {

        $email = new Input('my-hidden-field');
        $email->getValidatorChain()
            ->attach(new Validator\EmailAddress());

        //$tagsFilter = new Filter\StringTrim('');

        $email->getFilterChain()->attach(new Filter\StringTrim());

        $inputFilter = new InputFilter();
        $inputFilter->add($email);

        return $inputFilter;

    }

}