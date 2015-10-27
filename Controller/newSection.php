<?php
$section = new Section();


$newSection = $_GET['newSection'];
if(empty($newSection)){
    $newValue = 'please insert a new Section';
}
else {
    $resultSearch = $section->newSection($newSection);


}