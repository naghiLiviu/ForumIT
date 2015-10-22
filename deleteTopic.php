<?php
use Utils\Db;
$topicId = $_GET["topicId"];
$mysqli->query("UPDATE Topic SET TopicStatus='Deleted' WHERE TopicId=$topicId");
header("Location: topic.php?topicId=$topicId");