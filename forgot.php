<?php require("Utils/Db.php"); ?>
<?php
if(!empty($_POST["Email"])) {
    $password = substr(md5(rand(10000)), 0, 8);
    $email = $_POST["Email"];
    $mysqli->autocommit(false);
    $mysqli->query("UPDATE User SET Password='$password' WHERE Email=$email");
    if (!$mysqli->commit()) {
        $mysqli->rollback();
    }
    $message = "Noua parola a dumneavoastra este: $password";
    mail($email, 'Parola noua', $message);
    $_SESSION['message'] = "O noua parola a fost trimisa!";
}
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
                    <a href="forgot.php">
                        <button class="button1">Reset</button>
                    </a>
                    <input type="submit" value="Submit" name="submit" class="button1">
                </div>
        </form>
    </div>
    <?php require_once('footer.php'); ?>
</div>
</body>