<?php
use Utils\Db;

$newSection = $_POST['newSectionName'];

$mysqli->query("INSERT INTO Section (SectionName) VALUES ('$newSection')");