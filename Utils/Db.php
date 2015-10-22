<?php
namespace Utils;

class Db
{
    public $mysqli;

    function __construct()
    {
        if (empty($this->mysqli)) {
            $this->mysqli = $this->mysqlConnection();
        }
        return $this->mysqli;
    }

    private function mysqlConnection()
    {
        $mysqli = new mysqli ('localhost' , 'root' , 'root' , 'ForumIT');
        return $mysqli;
    }

}
?>
