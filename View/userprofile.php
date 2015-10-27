<?php
include '../Controller/UserProfileController.php';
include '../Utils/View/Common.html';
?>
<body class="mainbody">
<div class="container">
    <?php require('header.php'); ?>
    <div class="regform">
        <div class="leftpart">
            <?php

            echo 'Picture: <img src="../' . $userProfileArray['Picture'] .  '" class="userPhoto">';
            echo "<br>";
            echo "User Name: " . $userProfileArray['UserName'];
            echo "<br>";
            echo "Email: " . $userProfileArray['Email'];
            echo "<br>";
            echo "Rank : " . $userProfileArray['RoleName'];
            echo "<br>";
            echo "Posts: $countPost";

            ?>

        </div>

        <div class="rightpart">
            <?php
            echo "Register Date: " . $userProfileArray['RegisterDate'];
            echo "<br>";
            if ($_SESSION["roleId"] == Role::ADMIN) {
//                if ($role != Role::ADMIN) {
                    ?>
                    <form method="post">
                        Promote as :
                        <select name="dropDown" title="dropDownTitle">
                            <option value=""> - choose -</option>
                            <option value="admin">Administrator</option>
                            <option value="moderator">Moderator</option>
                        </select>
                        <br>
                        <input type="submit" value="Submit" name="submitButton" class="button1">
                    </form>
                    <?php
            }
            ?>

        </div>
        <div class="clearFix"></div>
    </div>


    <?php require_once('footer.php'); ?>
</div>
</body>