<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/18/15
 * Time: 5:14 PM
 */
?>
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
<script src="validatePasswordChange.js"></script>