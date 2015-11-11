<?php
namespace View;

include '../Controller/editTopicController.php';
include '../Utils/View/Common.html';
?>
<body class="mainbody">
<div class="container">
    <?php require_once("header.php"); ?>
    <div class="regform">
        <p>Edit a topic: </p>
        <br>

        <form method="post">
            <input type="text" name="topic" value="<?php echo $topicArray[0]['TopicName']; ?>" title="changeTopicName"><br>
            <select name="dropDown" title="selectFromSection">
                <option value=""> - Select a section - </option>
                <?php
                foreach($resultSection as $sectionKey => $sectionValue) {
                    ?>
                    <option
                        value="<?php echo $sectionValue["SectionId"]; ?>"><?php echo $sectionValue["SectionName"]; ?></option>
                    <?php
                }
                ?>
            </select>
            <br>
            <input type="submit" name="submit" value="Edit the topic" class="button1">
        </form>
        <br><br>
    </div>
    <?php require_once("footer.php"); ?>
</div>
</body>