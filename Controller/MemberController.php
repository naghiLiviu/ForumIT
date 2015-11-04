<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/26/15
 * Time: 2:57 PM
 */

include ('../Utils/View/Common.html');
include ('../Model/AbstractModel.php');
include ('../Model/User.php');
include ('../Model/Comment.php');
include ('../Model/Role.php');
include '../Utils/sessions.php';
include '../Model/Topic.php';


$newUser= new User();
$newComment = new Comment();


$resultMember = $newUser->getActiveUser();
$members = array();
foreach ($resultMember as $member) {
    $numberPosts = $newComment->countComments($member['UserId']);
    $member['NumberPosts'] = $numberPosts;
$members[] = $member;

}
