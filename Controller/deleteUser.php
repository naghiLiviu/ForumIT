<?php
include '../Model/AbstractModel.php';
include '../Model/User.php';

$user = new User();

$user->deleteUser($_GET["deleteUserId"]);

header("Location: ../View/member.php");