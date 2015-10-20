<div class="footer">
    <blockquote class="footerParagraph">Statistics</blockquote>
    <hr>
    <?php
    $resultNumberComment = $mysqli->query("SELECT CommentId FROM Comment");
    $numberComment = $resultNumberComment->num_rows;
    $resultNumberTopic = $mysqli->query("SELECT TopicId FROM Topic");
    $numberTopic = $resultNumberTopic->num_rows;
    $resultNumberUser = $mysqli->query("SELECT * FROM User");
    $numberUser = $resultNumberUser->num_rows;
    $resultNewestMember = $mysqli->query("SELECT UserId, UserName
                                          FROM User
                                          ORDER BY UserId DESC
                                          LIMIT 1");
    $newestMember = array();
    foreach($resultNewestMember as $newKey => $newValue){
        $newestMember[] = $newValue;
    }
    ?>
    <p class="footerParagraph">Total posts <?php echo $numberComment; ?> &#149; Total topics <?php echo $numberTopic; ?> &#149; Total members <?php echo $numberUser; ?> &#149; Our newest
        member <?php echo $newestMember[0]["UserName"]; ?></p>

    <div class="footerOption">
                    <span class="footerHome">
                        <a href="index.php"><img src="img/home.jpg">HOME</a>
                    </span>
                    <span class="footerLink">
                    <a href="View/faq.php">FAQ|</a>
                    <a href="member.php">Members|</a>
                        <?php
                        if (!isset($_SESSION['userId']) || $_SESSION['userId'] == null) {
                            echo "<a href=\"register.php\">Register|</a>";
                            echo "<a href=\"login.php\">Login</a>";
                        }else{
                            echo "<a href =\"logout.php\">Log out</a>";
                        }
                        ?>
                </span>
    </div>
    <p class="footerPower">Powered by Minions! They are milions!</p>
</div>