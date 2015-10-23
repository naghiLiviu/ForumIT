<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/22/15
 * Time: 1:55 PM
 */
namespace Model;

use Utils\Db;

require_once('../Utils/Autoload.php');

class User
{
    public $mysqli;
    function __construct() {
        if(empty($this->mysqli)) {
            $this->mysqli = new Db();
        }
    }

    public function checkUser($username, $password) {
        $crypt = md5($password);
        $sqlString = 'SELECT * FROM User WHERE UserName = "' . $username . '" AND Password = "' . $crypt . '"';
        $result = $this->mysqli->query($sqlString);
        return $result;
    }

    public function unbanUser($userId) {
        $sqlString = 'UPDATE User SET Ban = 0, BanDate = NULL WHERE UserId = "' . $userId . '"';
        $this->mysqli->query($sqlString);
    }

    public function updateRole($roleId, $userId) {
        $sqlString = 'UPDATE User SET RoleId = "' . $roleId . '" WHERE UserId = "' . $userId . '"';
        $this->mysqli->query($sqlString);
    }
}
