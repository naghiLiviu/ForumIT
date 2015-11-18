<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/22/15
 * Time: 4:39 PM
 */
namespace Controller;
use Model\User as User;
use Model\ContactDetail as ContactDetail;
use Model\Address as Address;

include '../Utils/sessions.php';
include '../Utils/autoload.php';


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
//$contactData->setPassword(md5($_POST['password']));
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
                    $lastContactDetailId = $mysqli->insert_id;
                    $contactAddress->insertUserAddress($country, $city, $streetName, $streetNumber,
                        $lastContactDetailId);
                    $_SESSION['message'] = "Update succesfull";
                } else {
                    $_SESSION['message'] = "Wrong Password";
                }

            } else {
                $_SESSION['message'] = "Password do not match";
            }

            header('Location: ../View/index.php');
        }
        $mysqli->close();
    } else {
        $_SESSION['message'] = "Please fill in all the fields";
    }
}