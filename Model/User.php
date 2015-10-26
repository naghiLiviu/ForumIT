<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/22/15
 * Time: 1:55 PM
 */

class User extends AbstractModel
{
    public function checkUser($username, $password) {
        $crypt = md5($password);
        $sqlString = 'SELECT * FROM User WHERE UserName = "' . $username . '" AND Password = "' . $crypt . '"';
        $result = $this->query($sqlString);

         return $result;
    }

    public function unbanUser($userId) {
        $sqlString = 'UPDATE User SET Ban = 0, BanDate = NULL WHERE UserId = "' . $userId . '"';
        $this->query($sqlString);
    }

    public function updateRole($roleId, $userId) {
        $sqlString = 'UPDATE User SET RoleId = "' . $roleId . '" WHERE UserId = "' . $userId . '"';
        $this->query($sqlString);
    }

    public function checkUserWhenRegister($username, $email) {
        $sqlString = 'SELECT * FROM User WHERE UserName = "' . $username . '" OR Email = "' . $email . '"';
        $result = $this->query($sqlString);

        return $result;
    }

    public function registerUser($username, $email, $password, $roleId) {
        $crypt = md5($password);
        $sqlString = "INSERT INTO User (Email, Password, UserName, RoleId) VALUES ('$email', '$crypt', '$username', '$roleId')";
        $this->query($sqlString);
    }
}
