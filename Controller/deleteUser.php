<?php
namespace Controller;
use Model\User as User;
include '../Utils/sessions.php';
include '../Utils/autoload.php';

$user = new User();

$user->deleteUser($_GET["deleteUserId"]);

header("Location: ../View/member.php");