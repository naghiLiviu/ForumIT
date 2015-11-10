<?php
namespace Controller;
use Model\Topic as Topic;
use Model\Comment as Comment;

include '../Utils/sessions.php';
include '../Utils/autoload.php';

$insertTopic = new Topic();
$insertComment = new Comment();

$topicName = $_POST['newTopicName'];
$sectionId = $_POST["sectionId"];
$newComment = $_POST ['newTopicComment'];
$userId = $_POST['userId'];

$addTopic = $insertTopic->newTopic($sectionId, $topicName);

$lastTopicId = $mysqli->insert_id;

$addComment = $insertComment->insertCommentsIntoLastTopic($userId, $lastTopicId, $comment);
