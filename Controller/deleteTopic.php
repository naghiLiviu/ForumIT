<?php
include '../Utils/sessions.php';
include '../Utils/autoload.php';

$topicId = $_GET["topicId"];
$sectionId = $_GET['sectionId'];

$deleteTopic = new Topic();

$deleteTopic->deleteTopic($topicId);

header('Location: ../View/topic.php?sectionId=' . $sectionId);