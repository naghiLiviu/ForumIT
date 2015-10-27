<?php
include '../Model/Section.php';

$sectionId = $_GET["sectionId"];

$section = new Section();

$section->deleteSection($sectionId);

header("Location: ../View/index.php");