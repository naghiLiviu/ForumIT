<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/26/15
 * Time: 10:44 AM
 */

$userData = new User();

$userId = $_SESSION['userId'];

$getUserData = $userData->getUserDetail($userId);

$userArray = array();

foreach ($getUserData as $userValue) {
    $userArray[] = $userValue;
}