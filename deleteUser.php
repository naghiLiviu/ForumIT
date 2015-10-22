<?php
use Utils\Db;
$deleteUserId = $_GET["deleteUserId"];
$mysqli->query("UPDATE User SET UserStatus='Deleted' WHERE UserId=$deleteUserId");
header("Location: member.php");