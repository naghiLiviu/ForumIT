<?php
///**
// * Created by PhpStorm.
// * User: my1-asus
// * Date: 12/4/15
// * Time: 1:48 PM
// */
//namespace Album\Form;
//
//use Zend\Validator;
//
////class RegisterFormValidator
////{
////    public function validator()
////    {
//
//
//        if ($_POST) {
//            $validatorUsername = new Validator\StringLength(6);
//
//            $validatorUsername->setMessage('The value you have just entered is to short; it must be at least 6 digits.');
//
//            if (!$validatorUsername->isValid($_POST['username'])) {
//                $message = $validatorUsername->getMessages();
//                echo current($message);
//            }
//
//            $validatorPassword = new Validator\StringLength(8);
//            $regex = '^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$';
//
////    $validatorPassword->setMessage('Password must be at least 8 digits long');
//            if (!$validatorPassword->isValid($_POST['password'])) {
//
////        $message = $validatorPassword->getMessages();
////        echo current($message);
//                echo '!minim';
//            } else {
//                $regexValidator = new Validator\Regex(array('pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/'));
//                if (!$regexValidator->isValid($_POST['password'])) {
//                    echo '!regex';
//                } else {
//                    if ($_POST['password'] != $_POST['confirmPassword']) {
////        $message = $validatorPassword->getMessages();
////        echo current($message);
//                        echo '!match';
//                    }
//                }
//            }
//        }
////    }
////}
