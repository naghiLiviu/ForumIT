<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/26/15
 * Time: 10:59 AM
 */

//include '../Utils/autoload.php';
//include '../Utils/sessions.php';
//include '../Model/AbstractModel.php';
//include '../Model/User.php';
//include '../Model/Comment.php';
//include '../Model/Topic.php';

$comment = new Comment();
$topic = new Topic();
//die('dupa topic obj');
$user = new User();
$userId = $_GET['userId'];
$resultNumberComment = $comment->selectComments();
$countTopics = $topic->countTopics();
$countUsers = $user->countUsers();
$resultNewestMember = $user->newestMember();
$comments = $comment->selectComments();
$countComments = $comments->num_rows;
$newestMember = array();

foreach($resultNewestMember as $newKey => $newValue) {
    $newestMember[] = $newValue;
}

$registerLink = '';
$loginLink = '';
$logoutLink = '';
if (!isset($_SESSION['userId']) && $_SESSION['userId'] == null) {
    $registerLink = '<a href="../View/register.php">Register</a> | ';
    $loginLink = '<a href="../View/login.php">LogIn</a>';
}else{
    $logoutLink = '<a href ="../logout.php">Log out</a>';
}
