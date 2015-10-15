<?php
session_start();
require_once ('common.php');
if (!empty ($_POST['username']) && !empty ($_POST['password'])){
    // preiau datele din formular
    $username = $_POST['username'];
    $password = $_POST['password'];
    $crypt = md5($password);


    $sqlString="SELECT * FROM User WHERE UserName = '$username' AND Password = '$crypt' ";

    $result=$mysqli->query($sqlString);
    if  ( $result->num_rows) {
        $_SESSION['message'] = "Welcome " . $username .  " into your account";
        $redirect = 'index.php';
     foreach ($result as $idValue) {
         $userId=$idValue["UserId"];
     }
        $_SESSION['userId']=$userId;
        $mysqli->close();

        header("Location: $redirect");
    }else{
        //$redirect = 'login.php';
        $_SESSION['message'] = 'GRESIT';
    }
}
    ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Log In</title>
</head>
<body class = "mainbody">
    <div class = "container">
        <?php require_once('header.php'); ?>
        <div class = "regform">
            <form name="login_form"  method="post">
                <dl>
                    <h2 class = "titleform">Login</h2>
                    <hr>
                <dl>
                    <dt>
                        <label for = "username">Username: </label>
                    </dt>
                    <dd>
                        <input class = "input" type = "text" name = "username" title = "Username">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <label for = "password">Password:</label>
                    </dt>
                    <dd>
                        <input class = "input" type = "password" name = "password" title = "Password">
                    </dd>
                </dl>
                <dl>
                    <a class = "link" href = "forgot.php"> Forgot password?</a><br>
                    <a class = "link" href = "resendEmail.php"> Resend activation e-mail</a>
                    <div class = "buttons">
                        <a href = "login.php"><button class = "button1">Reset</button></a>
                        <input type = "submit" value = "Submit" name = "submitButton" class = "button1">
            </form>
                    </div>



        </div>
        <br>

        <br>
        <div class = "regform">

                <p class = "registerLogin">Register</p>
                <p class = "suggestionLogin">In order to login you must be registered. Registering takes only a few moments but gives you increased
                    capabilities. The board administrator may also grant additional permissions to registered users.
                    Before you register please ensure you are familiar with our terms of use and related policies. Please
                    ensure you read any forum rules as you navigate around the board.</p>
                <hr>
            <div class = "buttons">
                <a class = "regButton" href = "register.php"><Button class = "button1">Register</Button></a>
            </div>

        </div>
        <?php require_once('footer.html'); ?>
    </div>

</body>

</html>
