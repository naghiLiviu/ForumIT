<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/29/15
 * Time: 1:07 PM
 */
include '../Model/AbstractModel.php';
include '../Model/User.php';
include '../Model/Topic.php';
include '../Model/Comment.php';

$password = new User();

$userId = $_SESSION['userId'];
$result = $password->getPassword($userId);
$myArray = array();
foreach ($result as $key => $value) {
    $myArray[] = $value;
    if ($_POST) {
        if (!empty($_POST['OldPassword']) && !empty($_POST['NewPassword']) && !empty($_POST['PasswordConfirm'])) {
            $oldPass = md5($_POST['OldPassword']);
            $newPass = md5($_POST['NewPassword']);
            $retypePass = md5($_POST['PasswordConfirm']);
            if ($result->num_rows) {
                if ($myArray[0]['Password'] == $oldPass) {
                    if ($newPass == $retypePass) {
                        $sql = $password->getPassword($oldPass);
                        $password->updatePassword($newPass, $userId);
                        $_SESSION['message'] = "Password changed succesfully";
                        header('Location: ../View/profile.php');
                    } else {
                        $_SESSION['message'] = "New password do not match";
                    }
                } else {
                    $_SESSION['message'] = "Old password is incorrect";
                }
            }
        } else {
            $_SESSION['message'] = "Please fill in all the fields";
        }
    }
}
