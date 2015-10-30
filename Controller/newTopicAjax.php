<?php
include '../Model/AbstractModel.php';
include '../Model/Topic.php';
include '../Model/Comment.php';

$insertTopic = new Topic();
$insertComment = new Comment();

$topicName = $_POST['newTopicName'];
$sectionId = $_POST["sectionId"];
$newComment = $_POST ['newTopicComment'];
$userId = $_POST['userId'];

$addTopic = $insertTopic->newTopic($sectionId, $topicName);

$lastTopicId = $mysqli->insert_id;

$addComment = $insertComment->insertCommentsIntoLastTopic($userId, $lastTopicId, $comment);
