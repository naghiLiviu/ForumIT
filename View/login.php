<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/22/15
 * Time: 4:23 PM
 */

require_once('../Controller/LoginController.php');
?>
<!DOCTYPE html>
<html>
<head>
    <script src="../https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>ForumIT</title>
    <link rel="icon" href="../img/forum.gif" type="image/x-icon">
    <link rel='stylesheet' href="style.css">
    <meta name="description" content="Forum">
    <meta name="keywords" content="IT">
    <meta name="author" content="Minions">
    <script src="scripting.js"></script>
</head>
<body class="mainbody">
<script src="validationLogin.js"></script>
<div class="container">
    <?php require_once('../header.php'); ?>
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
                    <a class="link" href="../forgot.php"> Forgot password?</a><br>

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
        <a class="regButton" href="../register.php">
            <Button class="button1">Register</Button>
        </a>
    </div>
</div>
<?php require_once('../footer.php'); ?>
</body>
</html>


