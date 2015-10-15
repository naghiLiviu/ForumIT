<?php require("common.php"); ?>
<?php
$_SESSION['message'] = null;
$sectionId = $_GET["sectionId"];
$isSetUserId = isset($_SESSION['userId']) || ($_SESSION['userId'] != null);

$sqlTopic = "SELECT * FROM Topic WHERE SectionId='$sectionId' AND TopicStatus='Active' ";
$resultTopic = $mysqli->query($sqlTopic);
?>
<body class="mainbody">
<div class="container">
    <?php require("header.php"); ?>
    <div class="content">
        <?php if ($isSetUserId) {
            echo '<a href = "newTopic.php?sectionId=' . $sectionId . '" ><button class="button1" > Post a new topic </button > </a >';
        } ?>
        <table>
            <tr>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last post</th>
            </tr>
            <?php
            foreach ($resultTopic as $topicKey => $topicValue) {
                $topicId = $topicValue["TopicId"];

                echo "<tr><td><a href=\"comment.php?topicId=$topicId\">" . $topicValue["TopicName"] . "</a></td>";
                $sqlComment = "SELECT * FROM Comment
                              LEFT JOIN User ON Comment.UserId = User.UserId
                              WHERE Comment.TopicId = '$topicId'AND Comment.CommentStatus='Active'
                              GROUP BY Comment.TopicId
                              ORDER BY Comment.CommentId DESC";
                $resultComment = $mysqli->query($sqlComment);
                $countComment = $resultComment->num_rows;
                $lastUserComment = array();
                foreach($resultComment as $commentKey => $commentValue){
                    $lastUserComment[] = $commentValue;
                }
                echo "<td>" . $countComment . "</td>";
                echo '<td>' . $lastUserComment[0]["UserName"] . '</td>';
                if ($_SESSION["roleId"] == 1 || $_SESSION["roleId"] == 2 ) {
                    echo "<td><a href=\"editTopic.php?topicId=$topicId\">Edit </a></td>";
                    echo '<td><button class="deleteButton" onclick="deleteFunction(' . $topicId . ')" id="demo">Delete</button></td></tr>';
                } else {
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
    <?php require("footer.php"); ?>
</div>

<script>var sectionId =<?php echo $sectionId; ?>

</script>

<script>
    function deleteFunction(id) {
        if (confirm("Are you sure you want to delete this topic?") == true) {
            window.location.href =("deleteTopic.php?topicId=" + id + "&sectionId=" + sectionId);
        } else {
            window.location.href =("topic.php?sectionId=" + sectionId);
        }
    }

</script>
</body>
</html>