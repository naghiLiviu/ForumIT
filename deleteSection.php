<?php
use Utils\Db;
$sectionId = $_GET["sectionId"];
$mysqli->query("UPDATE Section SET SectionStatus='Deleted' WHERE SectionId=$sectionId");
header("Location: index.php");