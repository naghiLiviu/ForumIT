<?php
use Utils\Db
// We check if all the fields are filled
if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['emailConfirm']) && !empty($_POST['password'])
    && !empty($_POST['passwordconf']) && !empty($_POST['antispam'])
) {
    // We take the values into variables
    $user = $_POST['username'];
    $email = $_POST['email'];
    $emailconf = $_POST['emailConfirm'];
    $pass = md5($_POST['password']);
    $passconf = md5($_POST['passwordconf']);
    $spam = $_POST['antispam'];
    $checkuser = "SELECT * FROM User WHERE UserName = '$user'";
    $selectuser = $mysqli->query($checkuser);
    $checkemail = "SELECT * FROM User WHERE Email = '$email'";
    $selectemail = $mysqli->query($checkemail);

    // we check if the username already exists in DB
    if ($selectuser->num_rows) {
        $_SESSION['register'] = "Username already exists!";
    } else {
        // we check if the email already exists in DB
        if ($selectemail->num_rows) {
            $_SESSION['register'] = "Email already exists!";
        } else {
            //we check if the email, password and spam match and we will insert data in DB
            if ($email == $emailconf && $pass == $passconf && $spam == 6) {
                $result = "INSERT INTO User (Email, Password, UserName, RoleId) VALUES ('$email', '$pass', '$user', '6')";
                $insert = $mysqli->query($result);
                header("Location: login.php");
            } else {
                $_SESSION['register'] = "The inserted data do not match";
            }
        }
    }
} else {
    $_SESSION['register'] = "Please fill in all the fields ";
}

?>


<body class="mainbody">

<script src="View/validateRegister.js"></script>

<div class="container">

    <?php require_once('header.php'); ?>

    <div class="regform">

        <h2>ForumIT Register</h2>

        <hr>

        <form name="register_form" method="post" onsubmit="return validateForm()">

            <dl>
                <dt>
                    <label for="username">Username: </label>
                </dt>
                <dd>
                    <input type="text" name="username" title="Username">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="email"> E-mail address: </label>
                </dt>
                <dd>
                    <input type="text" name="email" title="E-mail">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="Email_Confirm">E-mail Confirm: </label>
                </dt>
                <dd>
                    <input type="text" name="emailConfirm" title="E-mail Confirm">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="password">Passsword:</label>
                </dt>
                <dd>
                    <label>
                        <input type="password" name="password">
                    </label>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="passwordConfirm">Password Confirm:</label>
                </dt>
                <dd>
                    <input type="password" name="passwordconf" title="Password Confirm">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="antispam"> Antispam </label><br>
                <p class="restriction">2+2*2 = </p>
                <dd>
                    <input type="number" name="antispam" title="Anti Spam">
                </dd>
            </dl>

            <br>

            <div class="buttons">
                <a href="register.php">
                    <button class="button1">Reset</button>
                </a>
                <input type="submit" value="Submit" name="submit" class="button1">
            </div>

        </form>

    </div>

    <?php require_once('footer.php'); ?>
</div>
</body>
