<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/18/15
 * Time: 11:54 AM
 */
?>
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
                        <button type="reset" value="Reset" class="button1">Reset</button>
                        <button type="submit" value="Submit" class="button1">Submit</button>
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
        <a class="regButton" href="registerTemplate.php">
            <Button class="button1">Register</Button>
        </a>
    </div>
</div>
<script src="validationLogin.js"></script>

