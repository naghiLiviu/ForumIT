<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/28/15
 * Time: 11:42 AM
 */
namespace Controller;
use Model\Comment as Comment;
include '../Utils/sessions.php';
include '../Utils/autoload.php';


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
