<?php
include '../Utils/sessions.php';
include '../Utils/autoload.php';

$comment = new Comment();

$comment->deleteComment($_GET['commentId']);

header("Location: ../View/comment.php?topicId=" . $_GET['topicId']);