<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/26/15
 * Time: 1:28 PM
 */
namespace Controller;
use Model\Topic as Topic;
use Model\Comment as Comment;
use Model\Role as Role;
use Model\ViewFactory as ViewFactory;



class Topics
{
    public function topicAction()
    {
        $newTopic = new Topic();
        $newComment = new Comment();

        $sectionId = $_GET['sectionId'];

        $topic = array();
        $topicRow = array();
        $topics = array();
        $comment = array();
        $newTopicPost = '';
        $editTopic = '';
        $deleteTopic = '';

        $resultTopic = $newTopic->getTopicWithSectionId($sectionId);

        if (isset($_SESSION['userId']) && $_SESSION['userId'] != null) {
            $newTopicPost = '<button id="newTopicButton" class="button1" > Post a new topic </button >';
        }
        foreach ($resultTopic as $topicValue) {
            $topicRow[] = $topicValue;
            $commentLink = '<a href="comment.php?topicId=' . $topicValue['TopicId'] . '">' . $topicValue['TopicName'] . '</a>';

            $resultComment = $newComment->getCommentWithTopicId($topicValue['TopicId']);
            $countComment = $resultComment->num_rows;

            foreach ($resultComment as $commentValue) {
                $comment[] = $commentValue;
            }

            if ($_SESSION["roleId"] == Role::ADMIN || $_SESSION["roleId"] == Role::MODERATOR) {
                $editTopic = '<td><a href="editTopic.php?topicId=' . $topicValue['TopicId'] . '">Edit </a></td>';
                $deleteTopic = '<td><button class="deleteButton" onclick="deleteFunction(' . $topicValue['TopicId'] . ')" id="demo">
                    Delete</button></td></tr>';
            }

            $topic = array(
                'TopicName' => $commentLink,
                'Comments' => $countComment,
                'LastPost' => $comment[0]['UserName'],
                'EditTopic' => $editTopic,
                'DeleteTopic' => $deleteTopic
            );

            $topics[] = $topic;

        }

        $viewVars = array(
            'topics' => $topics,
            'newTopicPost' => $newTopicPost,
//            '$resultTopic' => $resultTopic,
//            '$resultComment' => $resultComment,
//            'comment' => $comment,
//            'topics' => $topics,
        );

        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);
        $viewModel->addVariables($viewVars);

        return $viewModel;

    }
}