<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/26/15
 * Time: 10:59 AM
 */
//die('3');
include('../Utils/sessions.php');

include('../Model/AbstractModel.php');
include('../Model/Topic.php');
include('../Model/Comment.php');


$topic = new Topic ();
$comment = new Comment();


$searchTopic = $_GET['SearchName'];
$searchMessage = '';
$searchValue = '';
if(empty($searchTopic)){
    $searchValue = 'please insert your search word';
}
else  {
    $resultSearch = $topic->searchTopicAndSection($searchTopic);
    $countResult = $resultSearch->num_rows;
    if ($countResult == 0) {
        $searchMessage = 'Nothing found';
    } else {
        $topicRows = array();
        foreach ($resultSearch as $row) {
            $topicId = $row["TopicId"];
            $resultComment = $comment->countCommentsByTopicId($topicId);

            $topicRows[] = array(
                'SectionName' => $row['SectionName'],
                'TopicName' => $row['TopicName'],
                'TopicCount' => $resultComment,
            );

        }
    }
}