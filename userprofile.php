<?php require_once('common.php');
?>
<body class="mainbody">
<div class="container">


    <?php require('header.php'); ?>
    <?php
    $memberId = $_GET['userId'];

    $sqlResult = "SELECT * FROM User
                  JOIN Role
                  ON User.RoleId = Role.RoleId
                  LEFT JOIN Comment
                  ON Comment.UserId = User.UserId
                  WHERE User.UserId =  '$memberId' ";
    $userDetail = $mysqli->query($sqlResult);
    $countPost = $userDetail->num_rows;
    foreach ($userDetail as $value) {
        if (!empty($value ['UserName'])) {
            $detailName = $value['UserName'];
        } else {
            $detailName = 'N/A';
        }
        if (!empty ($value ['Email'])) {
            $detailEmail = $value ['Email'];
        } else {
            $detailEmail = 'N/A';
        }
        if (!empty($value['RoleName'])) {
            $role = $value['RoleName'];
        } else {
            $role = 'N/A';
        }
            $registerDate = $value['RegisterDate'];


    }
    ?>

    <div class="regform">
        <div class="leftpart">
            <?php
            echo "Picture:";
            echo "<br>";
            echo "User Name: $detailName";
            echo "<br>";
            echo "Email: $detailEmail";
            echo "<br>";
            echo "Rank : $role";
            echo "<br>";
            echo "Posts: $countPost";

            ?>
        </div>

        <div class="rightpart">
            <?php
            echo "Register Date: $registerDate";
            echo "<br>";
            if ($_SESSION["roleId"] == 1) {
                if ($role != "Admin") {
                    ?>
                    <form method="post">
                        Promote as :
                        <select name="dropDown">
                            <option value=""> - choose -</option>
                            <option value="admin">Administrator</option>
                            <option value="moderator">Moderator</option>
                        </select>
                        <br>
                        <input type="submit" value="Submit" name="submitButton" class="button1">
                    </form>
                    <?php
                }
            }
            $dropDown = $_POST['dropDown'];
            if ($_POST) {

                if ($_POST['dropDown'] != "") {

                    if ($dropDown == "admin") {

                        $mysqli->query("UPDATE User SET User.RoleId = 1 WHERE User.UserId =  '$memberId' ");
                        header("Location: member.php");
                    }
                    if ($dropDown == "moderator") {
                        $mysqli->query("UPDATE User SET User.RoleId = 2 WHERE User.UserId =  '$memberId' ");
                        header("Location: member.php");
                    }
                    $mysqli->close();
                }
            }
            //
            ?>


        </div>
        <div class="clearFix"></div>
    </div>


    <?php require_once('footer.php'); ?>
</div>
</body>
</html>