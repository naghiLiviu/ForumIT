<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/26/15
 * Time: 12:03 PM
 */
//namespace View;
include '../Controller/HeaderController.php';

?>

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
                    <a href="member.php">Members | </a>
                    <a href="faq.php">FAQ | </a>

<?php

    echo $registerLink;
    echo $loginLink;
    echo $logoutLink;
?>

                </span>
</div>