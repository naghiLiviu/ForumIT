<?php
require_once("common.php");
$deleteUserId = $_GET["deleteUserId"];
$mysqli->query("UPDATE User SET UserStatus='Deleted' WHERE UserId=$deleteUserId");
header("Location: member.php");