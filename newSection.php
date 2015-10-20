<?php
require_once('Useful/common.php');

$newSection = $_POST['newSectionName'];

$mysqli->query("INSERT INTO Section (SectionName) VALUES ('$newSection')");