<?php
namespace View;
include '../Utils/sessions.php';
include '../Controller/ChangePasswordController.php';
include '../Utils/View/Common.html';
?>

<body class = "mainbody">
<script src="validatePasswordChange.js"></script>
<div class="container">
    <?php require_once('header.php'); ?>
    <div class="regform">
        <h2>Change Password</h2>

        <form name="PasswordChange" method="post" onsubmit="return validateChangePassword()">
            <dl>
                <dt>
                    <label for="OldPassword">Old Password: </label>
                </dt>
                <dd>
                    <input type="password" name="OldPassword">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="NewPassword">New Password: </label>
                </dt>
                <dd>
                    <input type="password" name="NewPassword">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="RetypePassword">Retype Password: </label>
                </dt>
                <dd>
                    <input type="password" name="PasswordConfirm" title="Password Confirm">
                </dd>
            </dl>
            <div class="buttons">
                <a href="changePassword.php">
                    <button class="button1">Reset</button>
                </a>
                <input type="submit" value="Submit" name="submit" class="button1">
            </div>

        </form>
    </div>
    <?php require_once('footer.php'); ?>
</div>
</body>