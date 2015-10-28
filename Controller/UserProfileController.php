<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/27/15
 * Time: 12:50 PM
 */
include('../Model/AbstractModel.php');
include '../Utils/sessions.php';
include '../Model/Role.php';
include '../Model/Comment.php';
include '../Model/User.php';
include '../Model/Topic.php';




$user = new User();
$comment = new Comment();
$memberId = $_GET['userId'];

$userProfileArray = array();
$userProfile = $user->userProfile($memberId);
$countPost = $comment->countComments($memberId);

foreach ($userProfile as $value) {
    if (!empty($value['UserName'])) {
        $detailName = $value['UserName'];
    } else {
        $detailName = 'N/A';
    }
    if (!empty ($value['Email'])) {
        $detailEmail = $value['Email'];
    } else {
        $detailEmail = 'N/A';
    }
    if (!empty($value['RoleName'])) {
        $role = $value['RoleName'];
    } else {
        $role = 'N/A';
    }
    $registerDate = $value['RegisterDate'];
    $picture = $value['Picture'];


    $userProfileArray = array(
        'UserName' => $detailName,
        'Email' => $detailEmail,
        'RoleName' => $role,
        'RegisterDate' => $registerDate,
        'Picture' => $picture
    );
}

$dropDown = $_POST['dropDown'];
if ($_POST) {

    if ($_POST['dropDown'] != "") {

        if ($dropDown == "admin") {

            $result = $user->updateRole(Role::ADMIN, $memberId);


            header("Location: /View/member.php");
        }
        if ($dropDown == "moderator") {
            $result = $user->updateRole(Role::MODERATOR, $memberId);
            header("Location: /View/member.php");
        }
        $mysqli->close();
    }
}