<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/28/15
 * Time: 3:16 PM
 */

include '../Utils/sessions.php';
include '../Model/AbstractModel.php';
//include '../Model/Comment.php';
include '../Model/User.php';

$user = new User();

$banUserId = $_GET["banUserId"];
$banDate = date("Y-m-d", strtotime("+15 days"));
$banUser = $user->banUser($banUserId, $banDate);
header("Location: member.php");