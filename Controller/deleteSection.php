<?php
include '../Utils/sessions.php';
include '../Utils/autoload.php';
$sectionId = $_GET["sectionId"];
$section = new Section();

$section->deleteSection($sectionId);

header("Location: ../View/index.php");