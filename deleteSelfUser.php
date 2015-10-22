<?php
use Utils\Db;
$deleteUserId = $_SESSION["userId"];
$mysqli->query("UPDATE User SET UserStatus='Deleted' WHERE UserId=$deleteUserId");
header("Location: logout.php");