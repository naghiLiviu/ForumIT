<?php
namespace Utils;

//use mysqli;

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
        $mysqliConnection = new \mysqli ('localhost' , 'root' , 'root' , 'ForumIT');
        return $mysqliConnection;
    }
}

