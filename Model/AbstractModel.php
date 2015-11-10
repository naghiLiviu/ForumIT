<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/23/15
 * Time: 3:39 PM
 */
namespace Model;

class AbstractModel
{
    public $mysqliObject;

    function __construct()
    {
        if (empty($this->mysqliObject)) {
            $this->mysqliObject = new \Utils\Db();
        }
    }

    function query($data)
    {
        $mysqliConnection = new \mysqli ('localhost', 'root', 'root', 'ForumIT');

        return $mysqliConnection->query($data);
    }
}