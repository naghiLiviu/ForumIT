<?php
namespace Controller;
use Model\Section as Section;

include '../Utils/sessions.php';
include '../Utils/autoload.php';

$section = new Section();

$newSection = $_POST['newSectionName'];

$section->newSection($newSection);