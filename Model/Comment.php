<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/23/15
 * Time: 10:58 AM
 */

class Comment extends AbstractModel
{
//    public $mysqli;
//    function __construct() {
//        if(empty($this->mysqli)) {
//            $this->mysqli = new Db();
//        }
//    }
    public function countComments($userId) {
        $result = $this->query("SELECT CommentId FROM Comment WHERE UserId = '$userId'");
        $countComment = $result->num_rows;
        return $countComment;
    }
    public function countCommentsByTopicId($topicId) {
        $result = $this->query('SELECT * FROM Comment WHERE TopicId="' . $topicId . '"');
        $countComment = $result->num_rows;
        return $countComment;

    }

    public function selectComments() {
        $sqlString = 'SELECT CommentId FROM Comment';
        $result = $this->query($sqlString);
        return $result;
    }

    public  function getCommentWithTopicId($topicId) {
        $sqlString = 'SELECT * FROM Comment
                      LEFT JOIN User ON Comment.UserId = User.UserId
                      WHERE Comment.TopicId = "' . $topicId . '" AND Comment.CommentStatus="Active"
                      ORDER BY Comment.CommentId DESC';
        $result = $this->query($sqlString);

        return $result;
    }

    public function insertCommentsIntoLastTopic($userId, $lastTopicId, $comment) {
        $sqlString = 'INSERT INTO Comment (UserId, TopicId, Comment) VALUES ("' .  $userId . '", "' .  $lastTopicId . '", "' .  $comment . '")';
        $this->query($sqlString);

    }

    public function newComment($userId, $topicId, $comment) {
        $sqlString = 'INSERT INTO Comment (UserId, TopicId, Comment) VALUES ("' .  $userId . '", "' .  $topicId . '", "' .  $comment . '")';
        $this->query($sqlString);
    }

    public function selectCommentsByTopic($topicId) {
        $sqlString = 'SELECT *  FROM Comment JOIN Topic
                  ON Comment.TopicId = Topic.TopicId
                  JOIN User
                  ON Comment.UserId = User.UserId
                  JOIN Role
                  ON User.RoleId=Role.RoleId
                  WHERE Topic.TopicId = "' .  $topicId . '" AND Comment.CommentStatus = "Active"
                  ORDER BY Comment.CommentParentId ASC ';
        $result = $this->query($sqlString);
        return $result;
    }
    public function editComment($commentId, $comment)
{
    $sqlString = 'UPDATE Comment SET Comment="' . $comment .'" WHERE CommentId = "' . $commentId . '"';

    $this->query($sqlString);
}
    public function getCommentByCommentId($data)
    {
        $sqlString = 'SELECT Comment FROM Comment WHERE CommentId = "' . $data . '"';
        $result = $this->query($sqlString);
        return $result;
    }

    public function deleteComment($commentId) {
        $sqlString = 'UPDATE Comment SET CommentStatus="Deleted" WHERE CommentId="' . $commentId . '"';
        $this->query($sqlString);
    }
}