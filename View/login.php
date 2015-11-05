<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/22/15
 * Time: 4:23 PM
 */

include '../Controller/LoginController.php';
include '../Utils/View/Common.html';
?>

<body class="mainbody">
<script src="validationLogin.js"></script>
<div class="container">
    <?php require_once('header.php'); ?>
    <div class="regform">
        <form name="myForm" onsubmit="return validateForm()" method="post">
            <dl>
                <h2 class="titleform">Login</h2>
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
                        <label for="password">Password:</label>
                    </dt>
                    <dd>
                        <input class="input" type="password" name="password" title="Password">
                    </dd>
                </dl>
                <dl>
                    <a class="link" href="forgotPassword.php"> Forgot password?</a><br>
                    <div class="buttons">
                        <a href="login.php">
                            <button class="button1">Reset</button>
                        </a>
                        <input type="submit" value="Submit" name="submitButton" class="button1">
        </form>
    </div>
</div>
<br>
<br>
<div class="regform">
    <p class="registerLogin">Register</p>
    <p class="suggestionLogin">In order to login you must be registered. Registering takes only a few moments but gives
        you increased
        capabilities. The board administrator may also grant additional permissions to registered users.
        Before you register please ensure you are familiar with our terms of use and related policies. Please
        ensure you read any forum rules as you navigate around the board.</p>
    <hr>
    <div class="buttons">
        <a class="regButton" href="register.php">
            <Button class="button1">Register</Button>
        </a>
    </div>
</div>
<?php require_once('footer.php'); ?>
</body>


