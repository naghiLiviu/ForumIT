<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/30/15
 * Time: 10:59 AM
 */
include '../Utils/sessions.php';
include '../Model/AbstractModel.php';
include '../Model/User.php';

$userId = $_GET['userId'];
$userActivate = new User();

$userActivate->activateUserAccount($userId);
$_SESSION['message'] = 'Account succesfully activated !';
header('Location: ../View/login.php');


