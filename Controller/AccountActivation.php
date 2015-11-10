<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/30/15
 * Time: 10:59 AM
 */
namespace Controller;

use Model\User as User;

include '../Utils/sessions.php';
include '../Utils/autoload.php';

$userId = openssl_decrypt($_GET['userId'], "AES-256-CBC", "25c6c7ff35b9979b151f2136cd13b0ff");
$userActivate = new User();
$status = $userActivate->getStatus($userId);
$userStatus = '';
foreach($status as $value) {
    $userStatus = $value['UserStatus'];
}
if($userStatus == 'Registered') {
    $userActivate->activateUserAccount($userId);
    $_SESSION['message'] = 'Account succesfully activated !';
    header('Location: ../View/login.php');
} else {
    $_SESSION['message'] = 'Validation link has expired';
    header('Location: ../View/register.php');
}
