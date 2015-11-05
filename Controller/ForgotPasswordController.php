<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/30/15
 * Time: 10:22 AM
 */

include '../Utils/sessions.php';
include '../Utils/autoload.php';

$user = new User();

if ($_POST) {

    if (!empty($_POST["Email"])) {

        $password = substr(md5(rand(10000)), 0, 8);

        $user->changeForgottenPassword($password, $_POST['Email']);

        $message = "Noua parola a dumneavoastra este: $password";

        mail($_POST['Email'], 'Parola noua', $message);

        $_SESSION['message'] = "O noua parola a fost trimisa!";

        header('Location: login.php');
    }
}