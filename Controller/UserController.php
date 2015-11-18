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
use Model\ContactDetail as ContactDetail;
use Model\Address as Address;
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

    public function changePasswordAction()
    {
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
                                header('Location: index.php?Controller=Controller\ProfileController&Action=profileAction&Template=profile');
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
        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);

        return $viewModel;
    }

    public function accountActivationAction()
    {
        $userId = openssl_decrypt($_GET['userId'], "AES-256-CBC", "25c6c7ff35b9979b151f2136cd13b0ff");
        $userActivate = new User();
        $status = $userActivate->getStatus($userId);
        $userStatus = '';
        foreach($status as $value) {
            $userStatus = $value['UserStatus'];
        }
        if($userStatus == 'Registered') {
            $userActivate->activateUserAccount($userId);
            $_SESSION['message'] = 'Account succesfully activated !';
            header('Location: index.php?Controller=Controller\UserController&Action=loginAction&Template=login');
        } else {
            $_SESSION['message'] = 'Validation link has expired';
            header('Location: index.php?Controller=Controller\Register&Action=registerAction&Template=register');
        }
    }

    public function registerAction()
    {
        $user = new User();

        if ($_POST) {
// We check if all the fields are filled
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['emailConfirm']) && !empty($_POST['password'])
                && !empty($_POST['passwordconf']) && !empty($_POST['antispam'])
            ) {
                // We interogate the database with the inserted values
                $userCheck = $user->checkUserWhenRegister($_POST['username'], $_POST['email']);

                // we check if the username already exists in DB
                if ($userCheck->num_rows) {
                    echo '<script>alert("Username or Email already exists!");</script>';
                } else {
                    //we check if the email, password and spam match and we will insert data in DB
                    if ($_POST['email'] == $_POST['emailConfirm'] && $_POST['password'] == $_POST['passwordconf'] && $_POST['antispam'] == 6) {
                        $email = $_POST['email'];
                        $user->registerUser($_POST['username'], $_POST['password'], $_POST['email'], Role::USER);
                        $result = $user->getUserId($email);
                        $userId = '';
                        foreach($result as $value) {
                            $userId = openssl_encrypt($value['UserId'], "AES-256-CBC", "25c6c7ff35b9979b151f2136cd13b0ff");
                        }
                        $subject = 'Account Activation';
                        $headers = 'From:noreply@forumIT.com' . "\r\n";
                        $message = 'http://forumit/View/index.php?Controller=Controller\Register&Action=accountActivationAction&userId=' . $userId . '" Click here if you want to activate your account on ForumIT';
                        mail($email, $subject, $message, $headers);
                        header("Location: index.php?Controller=Controller\UserController&Action=loginAction&Template=login");
                    } else {
                        echo '<script>alert("The inserted data do not match");</script>';
                    }
                }
            } else {
                echo '<script>alert("Please fill in all the fields ");</script>';
            }
        }
        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);
//        $viewModel->addVariables($viewVars);

        return $viewModel;
    }

    public function profileAction()
    {
        $contactData = new User();
        $contactDetails = new ContactDetail();
        $contactAddress = new Address();
        if (!isset($_SESSION['userId'])) {
            header("Location: ../View/login.php");
        }


        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $streetName = $_POST['streetName'];
        $streetNumber = $_POST['streetNumber'];
        $phone = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $passconf = md5($_POST['passwordconf']);
        $spam = $_POST['antispam'];

        $userId = $_SESSION['userId'];
        $target_path = "../img/";
        $target_path = $target_path . basename($_FILES['uploadedfile']['name']);

        if ($_POST) {
            if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                $_SESSION['message'] = "The File" . basename($_FILES['uploadedfile']['name']) . "has been uploaded";
            } else {
                $_SESSION['message'] = "There was an error uploading the file, please try again";
            }
        }


        $sqlemail = $contactData->getEmail($userId);
        $myEmail = array();
        foreach ($sqlemail as $emailKey => $emailValue) {
            $myEmail[] = $emailValue;
        }


        $sqlUserData = $contactData->selectUserData($userId, $pass);
        $sqlUserDetail = $contactDetails->selectUserProfile($userId);
        $dataArray = array();
        foreach ($sqlUserData as $dataKey => $dataValue) {
            $dataArray[] = $dataValue;
        }
        $detailArray = array();
        foreach ($sqlUserDetail as $detailKey => $detailValue) {
            $detailArray[] = $detailValue;
        }
        if ($_POST) {

            if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['country']) && !empty($_POST['city'])
                && !empty($_POST['streetName']) && !empty($_POST['streetNumber']) && !empty($_POST['phoneNumber']) && !empty($_POST['email'])
                && !empty($_POST['password']) && !empty($_POST['passwordconf']) && !empty($_POST['antispam'])

            ) {

                if ($sqlUserData->num_rows && $sqlUserDetail->num_rows) {

                    if ($pass == $passconf && $spam == '6') {
                        $sqlVerify = $contactData->selectUserData($userId, $pass);
                        if ($sqlVerify->num_rows) {
                            $updateContactDetail = $contactDetails->updateUserProfile($fname, $lname, $phone, $target_path,
                                $userId);
                            $contactDetailId = $detailArray[0]["ContactDetailId"];
                            $updateAddress = $contactAddress->updateUserAddress($country, $city, $streetName, $streetNumber,
                                $contactDetailId);
                            $updateEmail = $contactData->updateUserData($userId, $email);
                            $_SESSION['message'] = "Update succesfull";
                        } else {
                            $_SESSION['message'] = "Wrong Password";
                        }

                    } else {
                        $_SESSION['message'] = "Password do not match";
                    }

                    header('Location: ../View/index.php');
                } else {
                    if ($pass == $passconf && $spam == '6') {
                        $sqlVerify = $contactData->selectUserData($userId, $pass);
                        if ($sqlVerify->num_rows) {
                            $contactDetails->insertUserProfile($fname, $lname, $phone, $target_path, $userId);
//                            $lastContactDetailId = $mysqli->insert_id;
//                            $contactAddress->insertUserAddress($country, $city, $streetName, $streetNumber,
//                                $lastContactDetailId);
                            $_SESSION['message'] = "Update succesfull";
                        } else {
                            $_SESSION['message'] = "Wrong Password";
                        }

                    } else {
                        $_SESSION['message'] = "Password do not match";
                    }

                    header('Location: ../View/index.php');
                }
//                $mysqli->close();
            } else {
                $_SESSION['message'] = "Please fill in all the fields";
            }
        }
        $viewVars = array(
            'myEmail' => $myEmail,
            'dataArray' => $dataArray,
            'detailArray' =>$detailArray,
        );

        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);
        $viewModel->addVariables($viewVars);

        return $viewModel;
    }
}