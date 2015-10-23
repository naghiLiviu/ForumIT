<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/23/15
 * Time: 10:58 AM
 */
namespace Model;

use Utils\Db;

include '../Utils/Db.php';

class Comment
{
    public $mysqli;
    function __construct() {
        if(empty($this->mysqli)) {
            $this->mysqli = new Db();
        }
    }
    public function countComments($userId) {
        $result = $this->mysqli->query("SELECT CommentId FROM Comment WHERE UserId = '$userId'");
        $countComment = $result->num_rows;
        return $countComment;
    }
}