<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/26/15
 * Time: 10:59 AM
 */
namespace Controller;
use Model\Topic as Topic;
use Model\Comment as Comment;

include '../Utils/sessions.php';
include '../Utils/autoload.php';


$topic = new Topic ();
$comment = new Comment();

$topicId = $_GET["topicId"];
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
                'TopicId' => $topicId
            );

        }
    }
}