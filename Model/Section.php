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

        $sqlString = 'SELECT * FROM Section';
        $result = $this->query($sqlString);

        return $result;
    }
    public function newSection($data) {
        $sqlString = 'INSERT INTO Section (SectionName) VALUES ("' . $data . '")';
        $result = $this->query($sqlString);

        return $result;
    }
}


