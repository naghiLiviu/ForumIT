<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/22/15
 * Time: 1:55 PM
 */

//include '../Model/AbstractModel.php';

class User extends AbstractModel
{
    public function checkUser($username, $password)
    {
        $crypt = md5($password);
        $sqlString = 'SELECT * FROM User WHERE UserName = "' . $username . '" AND Password = "' . $crypt . '"';

        $result = $this->query($sqlString);

        return $result;
    }

    public function unbanUser($userId)
    {
        $sqlString = 'UPDATE User SET Ban = 0, BanDate = NULL WHERE UserId = "' . $userId . '"';

        $this->query($sqlString);
    }
    public function banUser($banUserId, $banDate)
    {
        $sqlString = 'UPDATE User SET Ban = 1, BanDate = "' . $banDate . '" WHERE UserId = "' . $banUserId . '"';

        $this->query($sqlString);
    }

    public function updateRole($roleId, $userId)
    {
        $sqlString = 'UPDATE User SET RoleId = "' . $roleId . '" WHERE UserId = "' . $userId . '"';

        $this->query($sqlString);
    }

    public function checkUserWhenRegister($username, $email)
    {
        $sqlString = 'SELECT * FROM User WHERE UserName = "' . $username . '" OR Email = "' . $email . '"';
        $result = $this->query($sqlString);

        return $result;
    }

    public function registerUser($username, $password,$email,  $roleId)
    {
        $crypt = md5($password);
        $sqlString = "INSERT INTO User (UserName, Password, Email, RoleId, UserStatus) VALUES ('$username', '$crypt', '$email', '$roleId', 'Deleted')";
        $this->query($sqlString);
    }

    public function selectUserData($userId, $pass)
    {
        $sqlemail = 'SELECT * FROM User WHERE User.UserId = "' . $userId . '" AND Password = "' . $pass . '"';
        //$sqlVerify           = 'SELECT Password FROM User WHERE Password = "' .  $pass . '"';

        $resultEmail = $this->query($sqlemail);
        //$resultVerify = $this->query($sqlVerify);

        return $resultEmail;

    }

    public function updateUserData($userId, $email)
    {
        $updateUser = 'UPDATE User SET Email = "' . $email . '" WHERE User.UserId = "' . $userId . '"';

        $this->query($updateUser);
    }

    public function countUsers()
    {
        $sqlString = 'SELECT * FROM User';
        $result = $this->query($sqlString);
        $countUsers = $result->num_rows;
        return $countUsers;
    }

    public function newestMember()
    {
        $sqlString = 'SELECT UserId, UserName FROM User ORDER BY UserId DESC LIMIT 1';
        $result = $this->query($sqlString);
        return $result;

    }

    public function getUserDetail($userId)
    {
        $sqlString = 'SELECT * FROM User
                      JOIN Role ON User.RoleId = Role.RoleId
                      JOIN ContactDetail ON ContactDetail.UserId = User.UserId
                      WHERE User.UserId = "' . $userId . '"';
        $result = $this->query($sqlString);

        return $result;
    }

    public function getActiveUser()
    {
        $sqlString = 'SELECT * FROM User
                      JOIN Role
                      ON User.RoleId = Role.RoleId
                      WHERE User.UserStatus="Active" AND Ban =0 ';
        $result = $this->query($sqlString);
        return $result;
    }

    public function userProfile($data)
    {
        $sqlString = 'SELECT * FROM User
                  JOIN Role
                  ON User.RoleId = Role.RoleId
                  LEFT JOIN Comment
                  ON Comment.UserId = User.UserId
                  LEFT JOIN ContactDetail
                  ON ContactDetail.UserId = User.UserId
                  WHERE User.UserId = "' . $data . '"';
        $result = $this->query($sqlString);

        return $result;
    }

    public function getEmail($userId) {
        $sqlString = 'SELECT Email from User WHERE UserId = "' . $userId . '"';
        $result = $this->query($sqlString);
        return $result;
    }

    public function getPassword($userId) {
        $sqlString = 'SELECT Password FROM User WHERE User.UserId = "' . $userId . '"';
        $result = $this->query($sqlString);
        return $result;
    }

    public function updatePassword($newPass, $userId) {
        $sqlString = 'UPDATE User SET Password = "' . $newPass . '" WHERE User.UserId = "' . $userId . '"';
        $this->query($sqlString);

    }

    public function deleteUser($userId) {
        $sqlString = 'UPDATE User SET UserStatus="Deleted" WHERE UserId="' . $userId . '"';
        $this->query($sqlString);
    }

    public function activateUserAccount ($userId) {
        $sqlString = 'UPDATE User SET UserStatus = "Active" WHERE UserId = "' . $userId . '"';
        $this->query($sqlString);
    }

    public function changeForgottenPassword($password, $email) {
        $pass = md5($password);
        $sqlString = 'UPDATE User SET Password="' . $pass . '" WHERE Email="' . $email . '"';
        $this->query($sqlString);
    }

    public function getUserId($email) {
        $sqlString = 'SELECT UserId FROM User WHERE Email = "' . $email . '"';
        $result = $this->query($sqlString);
        return $result;
    }

}
