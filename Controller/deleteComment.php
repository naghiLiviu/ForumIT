<?php
include '../Model/AbstractModel.php';
include '../Model/Comment.php';

$comment = new Comment();

$comment->deleteComment($_GET['commentId']);

header("Location: ../View/comment.php?topicId=" . $_GET['topicId']);