<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/28/15
 * Time: 3:16 PM
 */
namespace Controller;
use Model\User as User;
include '../Utils/sessions.php';
include '../Utils/autoload.php';

$user = new User();

$banUserId = $_GET["banUserId"];
$banDate = date("Y-m-d", strtotime("+15 days"));
$user->banUser($banUserId, $banDate);
header("Location: member.php");