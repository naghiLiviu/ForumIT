<?php include '../Controller/TopicController.php'; ?>
<body class="mainbody">
<div class="container">
    <?php include 'header.php'; ?>
    <div class="content">
        <?php echo $newTopicPost; ?>
        <div id="hiddenForm">
            <p>New topic name:</p>
            <input type="text" id="newTopicName" title="inputNewTopicName">
            <br><br>
            <p>Please insert a comment:</p>
            <textarea id="newTopicComment" title="textareaNewTopicComment"></textarea>
            <br><br>
            <button id="submitNewTopic">Submit</button>
        </div>
        <table>
            <tr>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last post</th>
            </tr>
            <?php
            foreach ($topics as $topic) {
            ?>
                <tr>
                    <td><?php $topic['TopicName']; ?></td>
                    <td><?php $topic['Comments']; ?></td>
                    <td><?php $topic['LastPost']; ?></td>
                    <?php $topic['EditTopic']; ?>
                    <?php $topic['DeleteTopic']; ?>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</div>

<script src="newTopicForm.js"></script>

<script>
    $(document).ready(function () {
        var userId = <?php echo $_SESSION["userId"];?>;
        var sectionId = <?php echo $_GET["sectionId"]; ?>;
    });
</script>

<script src="postNewTopic.js"></script>

<script src="deleteTopic.js"></script>
</body>