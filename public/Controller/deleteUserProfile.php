<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/29/15
 * Time: 2:27 PM
 */
include '../Utils/sessions.php';
include '../Model/AbstractModel.php';
include '../Model/User.php';

$user = new User();

$user->deleteUser($_GET["deleteUserId"]);
session_destroy();
header("Location: ../View/index.php");
