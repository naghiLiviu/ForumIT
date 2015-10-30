<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/27/15
 * Time: 4:07 PM
 */
include '../Utils/sessions.php';
include '../Utils/View/Common.html';
include '../Model/AbstractModel.php';
include '../Model/Section.php';
include '../Model/User.php';


$section = new Section();
$sectionId = $_GET["sectionId"];
$sectionName = $_POST['section'];


$sectionToEdit = $section->getSectionById($sectionId);
$sectionArray = array();
foreach($sectionToEdit as $sectionEdited) {
    $sectionArray[] = $sectionEdited;
    if (!empty ($_POST['section'])) {
        $section->editSection($sectionId, $sectionName);
        header("Location: index.php");
    }
}


//$sectionId = $_GET["sectionId"];
//$result = $mysqli->query("SELECT SectionName FROM Section WHERE SectionId = '$sectionId '");
//$sectionArray = array();
//foreach($result as $key => $value){
//    $sectionArray[] = $value;
//}
//if (!empty ($_POST['section'])) {
//    $section = $_POST['section'];
//    $mysqli->query("UPDATE Section SET SectionName='$section' WHERE SectionId = '$sectionId'");
//    header("Location: index.php");
//}
//
