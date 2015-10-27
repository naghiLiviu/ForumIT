<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/23/15
 * Time: 4:52 PM
 */
class Section extends AbstractModel
{
    public function getSection() {

        $sqlString = 'SELECT * FROM Section WHERE SectionStatus = "Active" ';
        $result = $this->query($sqlString);

        return $result;
    }
    public function newSection($data) {
        $sqlString = 'INSERT INTO Section (SectionName) VALUES ("' . $data . '")';
        $result = $this->query($sqlString);

        return $result;
    }
    public function deleteSection($sectionId) {
        $sqlString = 'UPDATE Section SET SectionStatus="Deleted" WHERE SectionId= "' . $sectionId . '"';
        $this->query($sqlString);
    }
}


