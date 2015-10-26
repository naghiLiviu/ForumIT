<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/26/15
 * Time: 1:28 PM
 */

include '../Utils/sessions.php';
include '../Model/AbstractModel.php';
include '../Model/Topic.php';
include '../Model/Comment.php';
include '../Model/Role.php';

$newTopic = new Topic();
$newComment = new Comment();

$sectionId = 1;

$topic = array();
$topicRow = array();
$topics = array();
$comment = array();
$newTopicPost = '';
$editTopic = '';
$deleteTopic = '';

$resultTopic = $newTopic->getTopicWithSectionId($sectionId);

foreach ($resultTopic as $topicValue) {
    $topicRow[] = $topicValue;
    $commentLink = '<a href="comment.php?topicId=' . $topicValue['TopicId'] . '">' . $topicValue['TopicName'] . '</a>';

    $resultComment = $newComment->getCommentWithTopicId($topic['TopicId']);
    $countComment = $resultComment->num_rows;

    foreach ($resultComment as $commentValue) {
        $comment[] = $commentValue;
    }

    if (isset($_SESSION['userId']) && $_SESSION['userId'] != null) {
        $newTopicPost = '<button id="newTopicButton" class="button1" > Post a new topic </button >';
    }

    if ($_SESSION["roleId"] == Role::ADMIN || $_SESSION["roleId"] == Role::MODERATOR) {
        $editTopic = '<td><a href="editTopic.php?topicId=$topicId">Edit </a></td>';
        $deleteTopic = '<td><button class="deleteButton" onclick="deleteFunction(' . $topicRow['TopicId'] . ')" id="demo">
                    Delete</button></td></tr>';
    }

    $topic = array(
        'TopicName' => $commentLink,
        'Comments' => $countComment,
        'LastPost' => $comment[0]['UserName'],
        'EditTopic' => $editTopic,
        'DeleteTopic' => $deleteTopic
    );

    $topics[] = $topic;

}