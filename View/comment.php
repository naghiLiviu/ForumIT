<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/27/15
 * Time: 1:39 PM
 */
include '../Controller/CommentController.php';
include '../Utils/View/Common.html';
?>

<body class="mainbody">

<div class="container">
    <?php
    require('header.php');
    ?>
    <div class="regform">
        <?php
        $i = 0;
        $commentId = null;
        foreach ($arrayComments as $key => $row) {
            foreach ($row as $valueCommentParrent) {
                $i++;
                $commentId = $valueCommentParrent["CommentId"];

            if ($valueCommentParrent["CommentParentId"] == 0) {
                ?>

                <div class="lefttabel">
                    <h3> <?php echo $valueCommentParrent['TopicName']; ?></h3>
                    <br>

                    <p id="comment"><?php echo $valueCommentParrent['Comment']; ?></p>
                    <br>

                    <p id="postedBy">Posted by <?php echo $valueCommentParrent['UserName']; ?>,
                        <?php echo $valueCommentParrent['Date']; ?></p>
                    <hr>
                    <div id="hiddenForm<?php echo $i; ?>">
                        <textarea id="commentInput<?php echo $i; ?>" title="textarea"></textarea>
                        <br><br>
                        <button class="button1" id="submitHidden<?php echo $i; ?>">Submit</button>
                    </div>
                    <?php if (isset($_SESSION['userId']) || $_SESSION['userId'] != null) { ?>
                        <button id="replyButton<?php echo $i; ?>" type="button" value="hide/show">Reply</button>
                    <?php } ?>
                </div>
                <div class="righttabel">
                    <p><cite><?php echo $valueCommentParrent['UserName']; ?></cite></p>

                    <p><?php echo $valueCommentParrent["RoleName"]; ?></p>
<!--                    --><?php
//                    $userId = $valueCommentParrent['UserId'];
//                    $sqlStringP = "SELECT * FROM Comment
//                        WHERE Comment.UserId = '$userId' ";
//                    $countResult = $mysqli->query($sqlStringP);
//                    $count = $countResult->num_rows;
//                    $userId = $valueCommentParrent['UserId'];
//                    $countComments = $comment->countComments( $userId);
//                    ?>
                    <p> Posts: <?php echo "$countComments"; ?></p>
                    <?php
                    if ($_SESSION["userId"] == 1 || $_SESSION["userId"] == 2 || $_SESSION["userId"] == $userId) {
                        echo "<a href=\"editComment.php?commentId=$commentId&topicId=$topicId\"> Edit          |</a>";
                        echo "<button class=\"deleteButton\" onclick=\"deleteFunction(' . $commentId . ')\">Delete</button>";
//                            <a href=\"deleteComment.php?commentId=$commentId&topicId=$topicId\">Delete</a>";
                    }
                    ?>
                </div>
                <div class="clearFix"></div>
                <?php
            } else {
                echo "<div>";
                echo "<div id=\"reply\">";
                echo '<p>';
                echo $valueCommentParrent["Comment"];
                ?>
                <p id="repliedBy">Posted by <?php echo $valueCommentParrent['UserName']; ?>,
                    <?php echo $valueCommentParrent['Date']; ?></p>
            <?php
            echo '</p>';
            if ($_SESSION["userId"] == 1 || $_SESSION["userId"] == 2 || $_SESSION["userId"] == $valueCommentParrent) {
                echo "</div>";
                echo "<div id=\"userOption\">";
                echo "<a href=\"editComment.php?commentId=$commentId&topicId=$topicId\">Edit |</a>";
                echo "<button class=\"deleteButton\" onclick=\"deleteFunction(' . $commentId . ')\">Delete</button>";
                echo "</div>";
                echo "<div class=\"clearFix\"></div>";
                echo "</div>";
            } else {
                echo "</div>";
                echo "</div>";
            }
            }
            ?>
                <script>
                    $(document).ready(function () {
                        $('#hiddenForm<?php echo $i; ?>').hide();
                        $('#replyButton<?php echo $i; ?>').on('click', function () {
                            $('#hiddenForm<?php echo $i; ?>').show();
                            $("#replyButton<?php echo $i; ?>").hide();
                        });
                        $('#submitHidden<?php echo $i; ?>').on('click', function () {
                            $('#hiddenForm<?php echo $i; ?>').hide();
                        })
                    });
                </script>

                <script>
                    $(document).ready(function () {
                        var topicId = <?php echo $topicId; ?>;
                        var commentId = <?php echo $commentId; ?>;
                        var userId = <?php echo $_SESSION["userId"];?>;
                        $("#submitHidden<?php echo $i; ?>").click(function () {
                            var replyComment = document.getElementById("commentInput<?php echo $i; ?>").value;
                            $.ajax({
                                method: "POST",
                                url: "ajax.php",
                                data: {
                                    replyComment: replyComment,
                                    commentId: commentId,
                                    topicId: topicId,
                                    userId: userId
                                },
                                success: function () {
                                    location.reload();
                                }
                            });
                        });
                    });
                </script>
                <?php
            }
        }
        ?>
    </div>
    <?php if (isset($_SESSION['userId']) || $_SESSION['userId'] != null) { ?>
    <div class="regform">

        <p> Post a comment: </p>
        <br>

        <form method="post" name="submitComment" onsubmit="return countWords()">
            <textarea name="comment" rows="10" cols="40" title="textarea"></textarea><br><br>
            <input type="submit" name="submit" value="Post a comment" class="button1">
        </form>
        <?php
        }
        echo $_POST['replyComment'];
        ?>

        <script>
            var topicId =<?php echo $topicId; ?>;

            function deleteFunction(commentId) {
                if (confirm("Are you sure you want to delete this comment?") == true) {
                    window.location.href = ("deleteComment.php?commentId=" + commentId + "&topicId=" + topicId);
                } else {
                    window.location.href = ("comment.php?topicId=" + topicId);

                }
            }
        </script>

        <script>
            function countWords() {
                var comment = document.forms["submitComment"]["comment"].value;

                if (comment.length < 20) {
                    alert("Your comment is too short!");
                    return false;
                }
            }
        </script>

        <div class="clearFix"></div>
        <br><br>
        <?php require_once('footer.php'); ?>
    </div>

</div>
</body>
