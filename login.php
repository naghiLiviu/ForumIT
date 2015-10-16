<?php
require_once('common.php');

if ($_POST) {
    if (!empty ($_POST['username']) && !empty ($_POST['password'])) {
        // preiau datele din formular
        $username = $_POST['username'];
        $password = $_POST['password'];
        $crypt = md5($password);


        $sqlString = "SELECT * FROM User WHERE UserName = '$username' AND Password = '$crypt' ";

        $result = $mysqli->query($sqlString);
        $loginArray = array();
        foreach ($result as $idValue) {
            $loginArray[] = $idValue;
        }
        if ($result->num_rows && $loginArray[0]["UserStatus"] == "Active" && ($loginArray[0]["Ban"] == 0 ||
                ($loginArray[0]["Ban"] == 1 && $loginArray[0]["BanDate"] < date("Y-m-d")))) {
            $mysqli->query("UPDATE User SET Ban = 0, BanDate = NULL");
            $_SESSION['message'] = "Welcome " . $loginArray[0]["UserName"] . " into your account!";
            $redirect = 'index.php';
            $_SESSION['userId'] = $loginArray[0]["UserId"];
            $_SESSION["roleId"] = $loginArray[0]["RoleId"];
            $userId = $loginArray[0]["UserId"];
            $resultCountComments = $mysqli->query("SELECT CommentId FROM Comment WHERE UserId = '$userId'");
            $countComments = $resultCountComments->num_rows;
            if($loginArray[0]["RoleId"] != 1 && $loginArray[0]["RoleId"] != 2 && $loginArray[0]["RoleId"] != 5){
                if($countComments > 100 && $countComments < 200){
                    $mysqli->query("UPDATE User SET RoleId = 3");
                }elseif($countComments > 200 && $countComments < 400){
                    $mysqli->query("UPDATE User SET RoleId = 4");
                }elseif($countComments > 400){
                    $mysqli->query("UPDATE User SET RoleId = 5");
                }
            }
            $mysqli->close();

            header("Location: $redirect");
        } else {
            //$redirect = 'login.php';
            echo "<script> alert('Username or Password incorrect') </script>";

        }
    }
}
?>
<body class="mainbody">
<script src="validationLogin.js"></script>
<div class="container">
    <?php require_once('header.php'); ?>
    <div class="regform">
        <form name="myForm" action="login.php" onsubmit="return validateForm()" method="post">
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
                    <a class="link" href="forgot.php"> Forgot password?</a><br>
                    <a class="link" href="resendEmail.php"> Resend activation e-mail</a>

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