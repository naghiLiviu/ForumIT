

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Forgot Password</title>

</head>
<body class = "mainbody">
<div class = "container">
    <?php require_once('header.html'); ?>
    <div class = "regForm">

            <dl>
                <h2 class = "titleform">Send activation e-mail</h2>
                <hr>
            </dl>
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
                        <label for = "E-mail">E-mail:</label>
                    </dt>
                    <dd>
                        <input class = "input" type = "text" name = "E-mail" title = "E-mail">
                    </dd>
                    <p class = "suggestionLogin">Note: This must be the e-mail address associated with your account.<br> If
                        you have not changed this via your user control panel then it is the e-mail address you
                        registered your account with.</p>
                </dl>
                <dl>

    </div>
    <div class = "buttons">
        <br>
        <a href = "resendEmail.php"><button class = "button1">Reset</button></a>
        <input type = "submit" value = "Submit" name = "submit" class = "button1">
    </div>
    <?php require_once('footer.html'); ?>
</div>

</body>
</html>
