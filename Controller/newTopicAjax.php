<?php

$mysqli = new mysqli ('localhost', 'root', 'root', 'ForumIT');

$newTopic = $_POST['newTopicName'];
$sectionId = $_POST["sectionId"];
$newComment = $_POST ['newTopicComment'];
$userId = $_POST['userId'];

$mysqli->query("INSERT INTO Topic (SectionId, TopicName) VALUES ('$sectionId', '$newTopic')");

$lastTopicId = $mysqli->insert_id;

$mysqli->query("INSERT INTO Comment (UserId, TopicId, Comment) VALUES ('$userId','$lastTopicId','$newComment')");