<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/22/15
 * Time: 1:55 PM
 */
namespace Model;


use Utils\Db;

class User
{
    public function checkUser(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $crypt = md5($password);
        $sqlString = 'SELECT * FROM User WHERE UserName = "' . $username . '" AND Password = "' . $crypt . '"';

        $mysqli = new Db();

        $mysqli->query($sqlString);
    }
}
