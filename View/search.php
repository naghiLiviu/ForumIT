<?php
//namespace View;
include '../Controller/SearchController.php';
?>

<body class="mainbody">
<div class="container">
<?php require("header.php"); ?>
    <div class="regform">
        <?php
        echo $searchValue;
        ?>
        <table border="1">
            <tr>
                <th>Section Name</th>
                <th>Topic Name</th>
                <th>Posts</th>
            </tr>
            <?php
            if (empty($topicRows)) { ?>
                <tr><td colspan="3"> <?php echo $searchMessage; ?></td></tr>
            <?php } else {
                foreach ($topicRows as $topicRow) {
                    ?>
                    <tr>
                    <td><?php echo $topicRow['SectionName']; ?></td>
                    <td>
                        <a href="comment.php?topicId=<?php echo $topicRow['TopicId']; ?>"><?php echo $topicRow['TopicName']; ?></a>
                    </td>
                    <td><?php echo $topicRow['TopicCount']; ?></td>
                <?php }
                ?>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <?php require ("footer.php"); ?>
</div>
</body>
