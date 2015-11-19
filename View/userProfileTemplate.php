<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/19/15
 * Time: 5:30 PM
 */
?>
<div class="regform">
    <div class="leftpart">
        <?php
        echo 'Picture: <img src="../' . $userProfileArray['Picture'] . '" class="userPhoto">';
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
        if ($_SESSION["roleId"] == Model\Role::ADMIN && $userProfileArray['RoleName'] != 'Admin') {
            ?>
            <form method="post">
                Promote as :
                <select name="dropDown" title="dropDownTitle">
                    <option value=""> - choose -</option>
                    <option value="admin">Administrator</option>
                    <option value="moderator">Moderator</option>
                </select>
                <br>
                <button type="submit" value="Submit" class="button1">Submit</button>
            </form>
            <?php
        }
        ?>
    </div>
    <div class="clearFix"></div>
</div>