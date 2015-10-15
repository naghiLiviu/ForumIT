<?php
require_once("common.php");
$deleteUserId = $_GET["deleteUserId"];
$mysqli->query("UPDATE User SET Status='Deleted' WHERE UserId=$deleteUserId");
header("Location: member.php");