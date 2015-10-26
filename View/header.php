<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/26/15
 * Time: 12:03 PM
 */
include '../Controller/HeaderController.php';
?>
<div class="header">
                <span class="headerLeft">
                    <a href="index.php"><img src="../img/forum.gif" class="logo"></a>
                </span>
                <span class="headerCenter">

                    <h1>Best IT forum ever!</h1>
                </span>
                <span class="headerRight">
                    <form method="get" action="search.php" id="searchform">
                        <input type="text" name="SearchName" placeholder="Search your topic">
                        <input type="submit" name="submit" value="Search" class = "button1">
                    </form>
                </span>
</div>
<div class="user">
                <span class="userDetail">
                    <?php

                    if (isset($_SESSION['userId']) && $_SESSION['userId'] != null) {
                       include 'userbox.php';
                    }
                    ?>
</span>
<span class="userDetail">
                      <?php
                      if (!empty($_SESSION['message'])) {
                          echo $_SESSION['message'];
                          $_SESSION['message'] = null;
                      }
                      ?>
                </span>
<span class="userOption">
                    <a href="index.php">Home | </a>
                    <a href="../member.php">Members | </a>
                    <a href="faq.php">FAQ | </a>

<?php
    echo $registerLink;
    echo $loginLink;
    echo $logoutLink;
?>

                </span>
</div>