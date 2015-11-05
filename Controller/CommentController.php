<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/27/15
 * Time: 1:37 PM
 */

include '../Utils/sessions.php';
include '../Utils/autoload.php';

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
foreach ($arrayComments as $key => $row) {
    foreach ($row as $valueCommentParrent) {
        $i++;
        $commentId = $valueCommentParrent["CommentId"];

        $userId2 = $valueCommentParrent['UserId'];
        $countComments = $commentObject->countComments($userId2);

    }
}
