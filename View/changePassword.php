<?php
include '../Utils/sessions.php';
include '../Controller/ChangePasswordController.php';
include '../Utils/View/Common.html';
?>

<body class = "mainbody">
<div class="container">
    <?php require_once('header.php'); ?>
    <div class="regform">
        <h2>Change Password</h2>

        <form action = "changePassword.php" method="post">
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