<?php
require_once("common.php");
$topicId = $_GET["topicId"];
$mysqli->query("UPDATE Topic SET TopicStatus='Deleted' WHERE TopicId=$topicId");
header("Location: topic.php?topicId=$topicId");