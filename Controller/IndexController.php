<?php

/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/23/15
 * Time: 4:43 PM
 */
namespace Controller;
use Model\Role as Role;
use Model\User as User;
use Model\Comment as Comment;
use Model\Section as Section;
use Model\Topic as Topic;

//include '../Utils/autoload.php';
include '../Utils/sessions.php';
$viewModel = $viewFactory->create('testIndex');
$viewModel->addVariables (array('myTest' => 'acesta este un text'));
$viewModel->render();
var_dump($viewModel);

$comment = new Comment();
$section = new Section();
$topic = new Topic ();

$resultSection = $section->getSection();
$sections = array();
$topicArray = array();
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
        foreach ($resultTopic as $topicKey => $topicValue) {
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