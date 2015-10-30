<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/28/15
 * Time: 11:43 AM
 */

include '../Model/AbstractModel.php';
include '../Model/User.php';
include '../Model/Topic.php';
include '../Model/Section.php';

$topic = new Topic();
$section = new Section();

$topicId = $_GET["topicId"];

$result = $topic->getTopicWhereTopicId($topicId);
$commentArray = array();
$topicArray = array();
foreach($result as $key => $value){
    $topicArray[] = $value;
}
$resultSection = $section->getSection();
if (!empty ($_POST['topic']) && $_POST["dropDown"] != "") {
    $topic->updateTopic($_POST['topic'], $_POST['dropDown'], $topicId);
    header("Location: ../View/topic.php?sectionId=" . $_POST['dropDown']);
}