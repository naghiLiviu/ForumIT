<?php

/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/23/15
 * Time: 4:43 PM
 */
include '../Utils/sessions.php';
include '../Model/AbstractModel.php';
include '../Model/Comment.php';
include '../Model/Section.php';
include '../Model/Topic.php';
include '../Model/Role.php';
include '../Model/User.php';


//$user = new User();
$comment = new Comment();
$section = new Section();
$topic = new Topic ();
$role = new Role();

$resultSection = $section->getSection();
$sections = array();

foreach ($resultSection as $sectionKey => $sectionValue) {
    $editLink = '';
    $deleteLink = '';
    $sectionId = $sectionValue["SectionId"];
    $resultTopic = $topic->getTopic($sectionValue["SectionId"]);
    $countTopic = $resultTopic->num_rows;

    if ($sectionValue["SectionStatus"] == "Active") {
        if ($_SESSION["roleId"] == Role::ADMIN || $_SESSION["roleId"] == Role::MODERATOR) {
            $editLink = '<a href="../View/editSection.php">Edit</a>';

            if ($_SESSION["roleId"] == Role::ADMIN || $_SESSION["roleId"] == Role::MODERATOR) {
                $deleteLink = '<button class="deleteButton" onclick="deleteFunction(' . $sectionId . ')">Delete</button>';
            }
        }

        $countPosts = 0;
        $topicArray = array();
        foreach ($resultTopic as $topicKey => $topicValue) {
            $topicId = $topicValue["TopicId"];
            $topicArray[] = $topicValue;
            $countPosts = $comment->countCommentsByTopicId($topicValue["TopicId"]);

            $countPosts += $countPosts;

        }
        $lastPost = $topicArray[0]["UserName"];
        $sectionRow = array(
            'Section' => $sectionValue['SectionName'],
            'Topics' => $countTopic,
            'Posts' => $countPosts,
            'LastPost' => $lastPost,
            'editLink' => $editLink,
            'deleteLink' => $deleteLink,
        );
        $sections[] = $sectionRow;
    }
}