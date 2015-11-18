<?php
namespace Controller;
$registerLink = '';
$loginLink = '';
$logoutLink = '';
if (!isset($_SESSION['userId']) && $_SESSION['userId'] == null) {
    $registerLink = '<a href="index.php?Controller=Controller\UserController&Action=registerAction&Template=register">Register</a> | ';
    $loginLink = '<a href="index.php?Controller=Controller\UserController&Action=loginAction&Template=login">LogIn</a>';
}else{
    $logoutLink = '<a href ="index.php?Controller=Controller\UserController&Action=logoutAction">Log out</a>';
}
