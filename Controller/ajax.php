<?php
namespace Controller;

$mysqli = new mysqli ('localhost' , 'root' , 'root' , 'ForumIT');
$commentId = $_POST["commentId"];
$topicId = $_POST["topicId"];
$userId = $_POST["userId"];
$replyComment =  $_POST["replyComment"];
$mysqli->query("INSERT INTO Comment (UserId, TopicId, Comment, CommentParentId) VALUES ('$userId', '$topicId', '$replyComment', '$commentId')");
// nu merge
//merge