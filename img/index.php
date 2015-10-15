<?php require("common.php");?>
<body class="mainbody">
<div class="container">
    <?php require("header.php");
    $_SESSION['message'] = null;

    ?>
    <div class="content">

        <table>
            <tr>
                <th>Section</th>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last post</th>
            </tr>
            <?php
            $mysqli = new mysqli('localhost', 'root', 'root', 'ForumIT');
            $sqlSection = "SELECT * FROM Section ";
            $resultSection = $mysqli->query($sqlSection);
            foreach ($resultSection as $sectionKey => $sectionValue) {
                $sectionId = $sectionValue["SectionId"];
                $sqlTopic = "SELECT * FROM Topic WHERE SectionId='$sectionId'";
                $resultTopic = $mysqli->query($sqlTopic);
                $countTopic = $resultTopic->num_rows;
                echo "<tr><td>" . $sectionValue["SectionName"] . "</td><td>" . $countTopic . "</td><td>";
                $countPosts = 0;
                foreach ($resultTopic as $topicKey => $topicValue) {
                    $topicId = $topicValue["TopicId"];
                    $sqlComment = "SELECT * FROM Comment WHERE TopicId='$topicId'";
                    $resultComment = $mysqli->query($sqlComment);
                    $countComment = $resultComment->num_rows;
                    $countPosts += $countComment;
                }
                echo $countPosts . "</td><tr>";
            }
            ?>
        </table>
    </div>
    <?php require("footer.html"); ?>
</div>
</body>
</html>