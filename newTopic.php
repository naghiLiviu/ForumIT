<?php
require_once('Useful/common.php');
?>

<body class="mainbody">
<div class="container">
    <?php
    require('header.php');
    ?>

    <div class="regform">

        <?php
        if ($_POST) {
            if (isset($_SESSION['userId']) || $_SESSION['userId'] != null) {
                if (!empty ($_POST['newTopic']) && !empty($_POST['newComment'])) {
                    $newTopic = $_POST['newTopic'];
                    $sectionId = $_GET["sectionId"];
                    $newComment = $_POST ['newComment'];
                    $userId = $_SESSION['userId'];

                    $_SESSION['message'] = "Topic $newTopic inserted";
                    $mysqli->query("INSERT INTO Topic (SectionId, TopicName) VALUES ('$sectionId', '$newTopic')");
                    $lastTopicId = $mysqli->insert_id;
                    $mysqli->query("INSERT INTO Comment (UserId, TopicId, Comment) VALUES ('$userId','$lastTopicId','$newComment')");
                    header("Location: comment.php?topicId=$lastTopicId");
                } else {
                    $_SESSION['message'] = "Please fill in all the fields";
                }
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            }
        }
        ?>
        <p> Post a new topic: </p>
        <br>

        <form method="post" onsubmit="countWords()" name="submitTopic">
            <label>
                <input type="text" name="newTopic">
            </label><br>

            <p> Post a comment: </p>
            <label>
                <textarea name="newComment" rows="10" cols="40"></textarea>
            </label><br>
            <input type="submit" name="submit" value="Post" class="button1">
        </form>
        <script>
            function countWords() {
                var comment = document.forms["submitTopic"]["newComment"].value;

                if (comment.length < 20) {
                    alert("Your comment is too short!");
                    return false;
                }
            }
        </script>

        <br><br>
    </div>

    <?php require_once('footer.php'); ?>
</div>
</body>
