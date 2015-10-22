<?php
use Utils\Db;
$banUserId = $_GET["banUserId"];
$banDate = date("Y-m-d", strtotime("+15 days"));
$mysqli->query("UPDATE User SET Ban = 1, BanDate = '$banDate' WHERE UserId = '$banUserId'");
header("Location: member.php");