<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/27/15
 * Time: 1:37 PM
 */

include '../Model/AbstractModel.php';
include '../Model/Comment.php';

$commentObject = new Comment();

$topicId = $_GET['topicId'];
if (!empty ($_POST['comment'])) {
    $comment = $_POST['comment'];
    $userId = $_SESSION['userId'];
    $commentObject->newComment($userId, $topicId, $comment);
}


$searchTopics = $commentObject->selectCommentsByTopic($topicId);

$arrayComments = array();
foreach ($searchTopics as $value) {
    if (!empty($value["Comment"])) {
        if ($value["CommentParentId"] == 0) {
            $arrayComments["id" . $value["CommentId"]][] = $value;
        } else {
            $arrayComments["id" . $value["CommentParentId"]][] = $value;
        }
    }
}