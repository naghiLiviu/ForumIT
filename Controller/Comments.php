<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/18/15
 * Time: 11:11 AM
 */

namespace Controller;
use Model\Comment as Comment;
use Model\ViewFactory as ViewFactory;
//include '../Utils/sessions.php';
//include '../Utils/autoload.php';

class Comments
{
    public function commentAction()
    {
        $commentObject = new Comment();
        $i = 0;

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
        $valueCommentParrent = array();
        foreach ($arrayComments as $key => $row) {
            foreach ($row as $valueCommentParrent) {
                $i++;
                $commentId = $valueCommentParrent["CommentId"];

                $userId2 = $valueCommentParrent['UserId'];
                $countComments = $commentObject->countComments($userId2);

            }
        }

        $viewVars = array(
            'arrayComments' => $arrayComments,
            'valueCommentParrent' => $valueCommentParrent,

        );

        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);
        $viewModel->addVariables($viewVars);

        return $viewModel;

    }
}
