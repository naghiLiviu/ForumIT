<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/28/15
 * Time: 11:43 AM
 */
namespace Controller;
use Model\Topic as Topic;
use Model\Section as Section;

include '../Utils/sessions.php';
include '../Utils/autoload.php';

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