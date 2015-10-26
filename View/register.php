<?php
include '../Controller/RegisterController.php';
include '../Utils/Common.html';
?>

<body class="mainbody">

<script src="validateRegister.js"></script>

<div class="container">

    <?php require_once('../header.php'); ?>

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

    <?php require_once('../footer.php'); ?>
</div>
</body>
