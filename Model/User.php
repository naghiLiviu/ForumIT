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

    public function selectUserData($userId, $pass) {
        $sqlemail = 'SELECT * FROM User WHERE User.UserId = "' .  $userId . '" AND Password = "' .  $pass . '"';
        //$sqlVerify           = 'SELECT Password FROM User WHERE Password = "' .  $pass . '"';

        $resultEmail = $this->query($sqlemail);
        //$resultVerify = $this->query($sqlVerify);

        return $resultEmail;

    }

    public function updateUserData($userId, $email) {
        $updateUser = 'UPDATE User SET Email = "' .  $email . '" WHERE User.UserId = "' .  $userId . '"';

        $this->query($updateUser);
    }


}
