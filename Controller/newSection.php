<?php

include '../Model/AbstractModel.php';
include '../Model/Section.php';

$section = new Section();

$newSection = $_POST['newSectionName'];

$section->newSection($newSection);