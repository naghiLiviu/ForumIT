<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/23/15
 * Time: 4:48 PM
 */
namespace Controller;
use Model\User as User;

include '../Utils/sessions.php';
include '../Utils/autoload.php';

$user = new User();

if ($_POST) {
// We check if all the fields are filled
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['emailConfirm']) && !empty($_POST['password'])
        && !empty($_POST['passwordconf']) && !empty($_POST['antispam'])
    ) {
        // We interogate the database with the inserted values
        $userCheck = $user->checkUserWhenRegister($_POST['username'], $_POST['email']);

        // we check if the username already exists in DB
        if ($userCheck->num_rows) {
            echo '<script>alert("Username or Email already exists!");</script>';
        } else {
            //we check if the email, password and spam match and we will insert data in DB
            if ($_POST['email'] == $_POST['emailConfirm'] && $_POST['password'] == $_POST['passwordconf'] && $_POST['antispam'] == 6) {
                $email = $_POST['email'];
                $user->registerUser($_POST['username'], $_POST['password'], $_POST['email'], Role::USER);
                $result = $user->getUserId($email);
                $userId = '';
                foreach($result as $value) {
                   $userId = openssl_encrypt($value['UserId'], "AES-256-CBC", "25c6c7ff35b9979b151f2136cd13b0ff");
                }
                $subject = 'Account Activation';
                $headers = 'From:noreply@forumIT.com' . "\r\n";
                $message = 'http://forumit/Controller/AccountActivation.php?userId=' . $userId . '" Click here if you want to activate your account on ForumIT';
                mail($email, $subject, $message, $headers);
                header("Location: login.php");
            } else {
                echo '<script>alert("The inserted data do not match");</script>';
            }
        }
    } else {
        echo '<script>alert("Please fill in all the fields ");</script>';
    }
}