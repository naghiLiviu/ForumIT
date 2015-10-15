<?php
require_once("common.php");
$sectionId = $_GET["sectionId"];
$mysqli->query("UPDATE Section SET SectionStatus='Deleted' WHERE SectionId=$sectionId");
header("Location: index.php");