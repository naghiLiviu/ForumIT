<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/29/15
 * Time: 2:27 PM
 */
namespace Controller;
use Model\User as User;
include '../Utils/sessions.php';
include '../Utils/autoload.php';

$user = new User();

$user->deleteUser($_GET["deleteUserId"]);
session_destroy();
header("Location: ../View/index.php");
