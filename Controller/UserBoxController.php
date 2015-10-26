<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/26/15
 * Time: 10:44 AM
 */
//include ('../Utils/sessions.php');
//include '../Model/AbstractModel.php';
include ('../Model/User.php');

$userData = new User();

$userId = "1";

$getUserData = $userData->getUserDetail($userId);

$userArray = array();

foreach ($getUserData as $userValue) {
    $userArray[] = $userValue;
}