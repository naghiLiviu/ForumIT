<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/28/15
 * Time: 11:42 AM
 */

include '../Utils/sessions.php';
include '../Model/AbstractModel.php';
include '../Model/Comment.php';
include '../Model/Topic.php';
include '../Model/User.php';


$comment = new Comment();

$commentId = $_GET["commentId"];
$topicId = $_GET["topicId"];

$commentToEdit = $comment->getCommentByCommentId($commentId);

$commentArray = array();
foreach($commentToEdit as $key => $value) {
    $commentArray = $value;
}
    if (!empty ($_POST['comment'])) {
        $comm = $_POST['comment'];
        $commentEdited = $comment->editComment($commentId, $comm);
        header("Location: comment.php?topicId=$topicId");
    }
