<?php

//use \Model\User;
//use \Model\Comment;

include ('../Model/AbstractModel.php');

include '../Model/User.php';
include '../Model/Comment.php';
include '../Model/Role.php';

$user    = new User();
$comment = new Comment();

if ($_POST) {

    if (!empty ($_POST['username']) && !empty ($_POST['password'])) {
        // check if username and password are in DB
        $result = $user->checkUser($_POST['username'], $_POST['password']);
        $userLoginArray = array();
        foreach ($result as $idValue) {
            $userLoginArray[] = $idValue;
        }
        if ($result->num_rows && $userLoginArray[0]["UserStatus"] == "Active" && ($userLoginArray[0]["Ban"] == 0 ||
                ($userLoginArray[0]["Ban"] == 1 && $userLoginArray[0]["BanDate"] < date("Y-m-d")))) {
            // se efectueaza unban
            $user->unbanUser($userLoginArray[0]['UserId']);
            $_SESSION['message'] = "Welcome " . $userLoginArray[0]["UserName"] . " into your account!";
            $_SESSION['userId'] = $userLoginArray[0]["UserId"];
            $_SESSION["roleId"] = $userLoginArray[0]["RoleId"];

            $userId = $userLoginArray[0]["UserId"];

            $countComments = $comment->countComments($userLoginArray[0]['UserId']);
            if (
                $userLoginArray[0]["RoleId"] != Role::ADMIN &&
                $userLoginArray[0]["RoleId"] != Role::MODERATOR &&
                $userLoginArray[0]["RoleId"] != Role::LEGEND_USER
            ) {
                if($countComments > 100 && $countComments < 200){
                    $user->updateRole(Role::POWER_USER, $userLoginArray[0]["UserId"]);
                }elseif($countComments > 200 && $countComments < 400){
                    $user->updateRole(Role::ELITE_USER, $userLoginArray[0]["UserId"]);
                }elseif($countComments > 400){
                    $user->updateRole(Role::LEGEND_USER, $userLoginArray[0]["UserId"]);
                }
            }

            header("Location: ../index.php");
        } else {
            echo "<script> alert('Username or Password incorrect') </script>";

        }

    }
}
