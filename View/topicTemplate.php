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
//            var_dump($topics);
            foreach ($topics as $topic) {
            ?>
                <tr>
                    <td><?php echo $topic['TopicName']; ?></td>
                    <td><?php echo $topic['Comments']; ?></td>
                    <td><?php echo $topic['LastPost']; ?></td>
                    <?php echo $topic['EditTopic']; ?>
                    <?php echo $topic['DeleteTopic']; ?>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
<script src="newTopicForm.js"></script>

<script>
    var userId = <?php echo $_SESSION["userId"];?>;
    var sectionId = <?php echo $_GET["sectionId"]; ?>;
</script>

<script src="postNewTopic.js"></script>

<script src="deleteTopic.js"></script>
