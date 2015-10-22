<?php
require_once("Utils/Db.php");
$deleteUserId = $_GET["deleteUserId"];
$mysqli->query("UPDATE User SET UserStatus='Deleted' WHERE UserId=$deleteUserId");
header("Location: member.php");