<?php

include '../Controller/FooterController.php';

?>
<div class="footer">
    <blockquote class="footerParagraph">Statistics</blockquote>
    <hr>
    <p class="footerParagraph">Total posts <?php echo $countComments; ?> &#149; Total topics <?php echo $countTopics; ?> &#149; Total members <?php echo $countUsers; ?> &#149; Our newest
        member <?php echo $newestMember[0]["UserName"]; ?></p>

    <div class="footerOption">
                    <span class="footerHome">
                        <a href="index.php"><img src="../img/home.jpg">HOME</a>
                    </span>
                    <span class="footerLink">
                    <a href="faq.php">FAQ|</a>
                    <a href="member.php">Members|</a>
                        <?php
                            echo $registerLink;
                            echo $loginLink;
                            echo $logoutLink;
                        ?>
                </span>
    </div>
    <p class="footerPower">Powered by Minions! They are milions!</p>
</div>