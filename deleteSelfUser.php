<?php
require_once("Utils/Db.php");
$deleteUserId = $_SESSION["userId"];
$mysqli->query("UPDATE User SET UserStatus='Deleted' WHERE UserId=$deleteUserId");
header("Location: logout.php");