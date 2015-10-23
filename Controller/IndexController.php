<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/23/15
 * Time: 4:43 PM
 */
include ('../Model/AbstractModel.php');

include '../Model/User.php';
include '../Model/Comment.php';
include '../Model/Section.php';
include '../Model/Topic.php';
include '../Model/Role.php';

$user    = new User();
$comment = new Comment();
$section = new Section();
$topic   = new Topic ();
$role    = new Role();



//$roleId = $_SESSION['roleId'];
//$sqlSection = "SELECT * FROM Section";

$resultSection = $section->getSection();
$sections = array();
foreach ($resultSection as $sectionKey => $sectionValue) {
    $sectionId = $sectionValue["SectionId"];
    $resultTopic = $topic->getTopic($sectionValue["SectionId"]);
    $countTopic = $resultTopic->num_rows;

//    if ($sectionValue["SectionStatus"] == "Active") {
//        if ($_SESSION["roleId"] == 1 || $_SESSION["roleId"] == 2) {
//            echo ">Edit</a></td>";
//        } else {
//            echo "<tr>";
//        }
//        if ($_SESSION["roleId"] == $sectionValue["SectionId"];1) {
//            echo '<td><button class="deleteButton" onclick="deleteFunction(' . $sectionId . ')">Delete</button></td>';
//        }


//        echo "<td><a href=\"topic.php?sectionId=$sectionId\">" . $sectionValue["SectionName"] . "</a></td><td>" . $countTopic . "</td><td>";

        $countPosts = 0;
        $topicArray = array();
        foreach ($resultTopic as $topicKey => $topicValue) {
            $topicId = $topicValue["TopicId"];
            $topicArray[] = $topicValue;
            $countPosts = $comment->countCommentsByTopicId($topicValue["TopicId"]);
//
            $countPosts += $countComment;


//        echo $countPosts . "</td>";
//        echo '<td>' . $topicArray[0]["UserName"] . '</td></tr>';
    }
    $lastPost = $topicArray[0]["UserName"];
    $sectionRow = array(
        'Section'=> $sectionValue['SectionName'],
        'Topics' => $countTopic,
        'Posts' =>  $countPosts,
        'LastPost' =>  $lastPost,
    );
$sections[]=$sectionRow;

}