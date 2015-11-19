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
use Model\Section as Section;
use Model\ViewFactory as ViewFactory;



class TopicController
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
            $commentLink = '<a href="index.php?Controller=Controller\CommentController&Action=commentAction&Template=comment&topicId=' . $topicValue['TopicId'] . '">' . $topicValue['TopicName'] . '</a>';

            $resultComment = $newComment->getCommentWithTopicId($topicValue['TopicId']);
            $countComment = $resultComment->num_rows;

            foreach ($resultComment as $commentValue) {
                $comment[] = $commentValue;
            }

            if ($_SESSION["roleId"] == Role::ADMIN || $_SESSION["roleId"] == Role::MODERATOR) {
                $editTopic = '<td><a href="index.php?Controller=Controller\TopicController&Action=editAction&Template=editTopic&sectionId='.$sectionId.'&topicId='.$topicValue['TopicId'].'">Edit </a></td>';
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
        );

        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);
        $viewModel->addVariables($viewVars);

        return $viewModel;

    }

    public function editAction()
    {

        $topic = new Topic();
        $section = new Section();

        $topicId = $_GET["topicId"];
        $sectionId = $_GET['sectionId'];

        $result = $topic->getTopicWhereTopicId($topicId);
        $commentArray = array();
        $topicArray = array();
        foreach ($result as $key => $value) {
            $topicArray[] = $value;
        }
        $resultSection = $section->getSection();
        if (!empty ($_POST['topic']) && $_POST["dropDown"] != "") {
            $topic->updateTopic($_POST['topic'], $_POST['dropDown'], $topicId);
            header('Location: index.php?Controller=Controller\TopicController&Action=topicAction&Template=topic&sectionId='.$sectionId);

        }
        $viewVars = array(
            'topicArray' => $topicArray,
            'topic' => $topic,
            'resultSection' => $resultSection,
        );

        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);
        $viewModel->addVariables($viewVars);

        return $viewModel;
    }
    public function addAction()
    {
        $insertTopic = new Topic();
        $insertComment = new Comment();

        $topicName = $_POST['newTopicName'];
        $sectionId = $_POST["sectionId"];
        $newComment = $_POST ['newTopicComment'];
        $userId = $_POST['userId'];

        $lastTopicId = $insertTopic->newTopic($sectionId, $topicName);

        $insertComment->insertCommentsIntoLastTopic($userId, $lastTopicId, $newComment);

    }
    public function deleteAction()
    {
        $topicId = $_GET["topicId"];
        $sectionId = $_GET['sectionId'];

        $deleteTopic = new Topic();

        $deleteTopic->deleteTopic($topicId);

        header('Location: index.php?Controller=Controller\TopicController&Action=topicAction&Template=topic&sectionId=' . $sectionId);
    }
}