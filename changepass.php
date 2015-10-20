<?php
require('Useful/common.php');
$userId = $_SESSION['userId'];
$sqlPass = "SELECT Password FROM User WHERE User.UserId = '$userId'";
$result = $mysqli->query($sqlPass);
$myArray = array();
foreach ($result as $key => $value) {
    $myArray[] = $value;
    if ($_POST) {
        if (!empty($_POST['OldPassword']) && !empty($_POST['NewPassword']) && !empty($_POST['RetypePassword'])) {
            $oldPass = md5($_POST['OldPassword']);
            $newPass = md5($_POST['NewPassword']);
            $retypePass = md5($_POST['RetypePassword']);
            if ($result->num_rows) {
                if ($myArray[0]['Password'] == $oldPass) {
                    if ($newPass == $retypePass) {
                        $sql = "SELECT Password FROM User WHERE Password = '$oldPass'";
                        $updatePass = "UPDATE User SET Password = '$newPass' WHERE User.UserId = '$userId'";
                        $mysqli->query($updatePass);
                        $_SESSION['message'] = "Password changed succesfully";
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
?>
<body class = "mainbody">
<div class="container">
    <?php require_once('header.php'); ?>
<div class="regform">
        <h2>Change Password</h2>

        <form action = "changepass.php" method="post">
            <dl>
                <dt>
                    <label for="OldPassword">Old Password: </label>
                </dt>
                <dd>
                    <input type="password" name="OldPassword" title="Old Password">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="NewPassword">New Password: </label>
                </dt>
                <dd>
                    <input type="password" name="NewPassword" title="New Password">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="RetypePassword">Retype Password: </label>
                </dt>
                <dd>
                    <input type="password" name="RetypePassword" title="Retype your new password">
                </dd>
            </dl>
            <div class="buttons">
                <a href="changepass.php">
                    <button class="button1">Reset</button>
                </a>
                <input type="submit" value="Submit" name="submit" class="button1">
            </div>

        </form>
    </div>
    <?php require_once('footer.php'); ?>
</div>
</body>