<?php

/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/23/15
 * Time: 4:43 PM
 */
use Model\Role as Role;

include '../Utils/sessions.php';


$user = new Model\User();
$comment = new Model\Comment();
$section = new Model\Section();
$topic = new Model\Topic ();
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
            $editLink = '<a href="../View/editSection.php?sectionId=' . $sectionValue['SectionId'] . '">Edit</a>';

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
            'SectionId' => $sectionValue['SectionId'],
            'Topics' => $countTopic,
            'Posts' => $countPosts,
            'LastPost' => $lastPost,
            'editLink' => $editLink,
            'deleteLink' => $deleteLink,
        );
        $sections[] = $sectionRow;
    }
}