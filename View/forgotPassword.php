<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/30/15
 * Time: 10:20 AM
 */

include '../Controller/ForgotPasswordController.php';
include '../Utils/View/Common.html';
?>
<body class="mainbody">
<div class="container">
    <?php require_once('header.php'); ?>
    <div class="regform">
        <form method="post">
            <dl>
                <h2 class="titleform">Forgot Password</h2>
                <hr>
                <dl>
                    <dt>
                        <label for="username">Username: </label>
                    </dt>
                    <dd>
                        <input class="input" type="text" name="username" title="Username">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <label for="E-mail">E-mail:</label>
                    </dt>
                    <dd>
                        <input class="input" type="text" name="Email" title="E-mail">
                    </dd>
                    <p class="suggestionLogin">Note: This must be the e-mail address associated with your account.<br>
                        If
                        you have not changed this via your user control panel then it is the e-mail address you
                        registered your account with.</p>
                </dl>
                <div class="buttons">
                    <br>
                    <a href="forgotPassword.php">
                        <button class="button1">Reset</button>
                    </a>
                    <input type="submit" value="Submit" name="submit" class="button1">
                </div>
        </form>
    </div>
    <?php require_once('footer.php'); ?>
</div>

</body>
</html>