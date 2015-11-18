<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/18/15
 * Time: 11:57 AM
 */
namespace Controller;
use Model\User as User;
use Model\Comment as Comment;
use Model\ViewFactory as ViewFactory;

class UserController
{
    public function loginAction()
    {
        $user    = new User();
        $comment = new Comment();
        $userLoginArray = array();

        if ($_POST) {
            if (!empty ($_POST['username']) && !empty ($_POST['password'])) {
                // check if username and password are in DB
                $result = $user->checkUser($_POST['username'], $_POST['password']);
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
                    $countComments = $comment->countComments($userLoginArray[0]['UserId']);
//            if (
//                $userLoginArray[0]["RoleId"] != Role::ADMIN &&
//                $userLoginArray[0]["RoleId"] != Role::MODERATOR &&
//                $userLoginArray[0]["RoleId"] != Role::LEGEND_USER
//            ) {
//
//                if($countComments > 100 && $countComments < 200){
//                    $user->updateRole(Role::POWER_USER, $userLoginArray[0]["UserId"]);
//                }elseif($countComments > 200 && $countComments < 400){
//                    $user->updateRole(Role::ELITE_USER, $userLoginArray[0]["UserId"]);
//                }elseif($countComments > 400){
//                    $user->updateRole(Role::LEGEND_USER, $userLoginArray[0]["UserId"]);
//                }
//            }

                    header('Location: index.php?Controller=Controller\Index&Action=indexAction&Template=index');
                } else {
                    echo "<script> alert('Username or Password incorrect'); </script>";
                }

            }
        }
        $viewVars = array(
            'userLoginArray' => $userLoginArray,
        );

        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);
        $viewModel->addVariables($viewVars);

        return $viewModel;
    }

    public function logoutAction()
    {
        session_destroy();
        header('Location: index.php?Controller=Controller\Index&Action=indexAction&Template=index');
    }
}