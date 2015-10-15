<?php
require_once('common.php');
//I am here!!!
?>
<body class="mainbody">
<div class="container">
    <?php require("header.php"); ?>
    <div class="regform">
        <table border="1">
            <tr>
                <th>Section Name</th>
                <th>Topic Name</th>
                <th>Posts</th>
            </tr>
            <?php
            $searchTopic = $_GET['name'];
            $sqlString = "SELECT * FROM Topic
            LEFT JOIN Section
            ON Topic.SectionId=Section.SectionId
            WHERE TopicName LIKE  '%$searchTopic%' OR SectionName LIKE '%$searchTopic%'  ";
            $search = $mysqli->query($sqlString);
            foreach ($search as $row) {
                $topicId = $row["TopicId"];
                $sqlComment = "SELECT * FROM Comment WHERE TopicId='$topicId'";
                $resultComment = $mysqli->query($sqlComment);
                $countComment = $resultComment->num_rows;
                ?>
                <tr>
                    <td><?php echo $row['SectionName']; ?></td>
                    <td><a href="comment.php?topicId=<?php echo $topicId; ?>"><?php echo $row['TopicName']; ?></a></td>
                    <td><?php echo $countComment; ?></td>
                </tr>

                <?php
            }
            ?>
        </table>
    </div>
    <?php require("footer.php"); ?>
</div>
</body>
