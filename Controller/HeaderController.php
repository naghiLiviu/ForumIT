<?php
namespace Controller;
$registerLink = '';
$loginLink = '';
$logoutLink = '';
if (!isset($_SESSION['userId']) && $_SESSION['userId'] == null) {
    $registerLink = '<a href="../View/register.php">Register</a> | ';
    $loginLink = '<a href="../View/login.php">LogIn</a>';
}else{
    $logoutLink = '<a href ="../View/logout.php">Log out</a>';
}
