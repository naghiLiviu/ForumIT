<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/23/15
 * Time: 10:58 AM
 */

class Comment extends AbstractModel
{
    public $mysqli;
    function __construct() {
        if(empty($this->mysqli)) {
            $this->mysqli = new Db();
        }
    }
    public function countComments($userId) {
        $result = $this->query("SELECT CommentId FROM Comment WHERE UserId = '$userId'");
        $countComment = $result->num_rows;
        return $countComment;
    }
}