<?php
require_once('common.php');

$newSection = $_POST['newSectionName'];

$mysqli->query("INSERT INTO Section (SectionName) VALUES ('$newSection')");