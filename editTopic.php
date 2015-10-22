<?php require_once("Utils/Db.php");
$topicId = $_GET["topicId"];
$result = $mysqli->query("SELECT * FROM Topic WHERE TopicId = '$topicId '");
$commentArray = array();
foreach($result as $key => $value){
    $topicArray[] = $value;
}
if (!empty ($_POST['topic']) && $_POST["dropDown"] != "") {
    $topic = $_POST['topic'];
    $sectionId = $_POST["dropDown"];
    $mysqli->query("UPDATE Topic SET TopicName='$topic', SectionId='$sectionId' WHERE TopicId = '$topicId'");
    header("Location: index.php");
}
?>
<body class="mainbody">
<div class="container">
    <?php require_once("header.php"); ?>
    <div class="regform">
        <p>Edit a topic: </p>
        <br>

        <form method="post">
            <input type="text" name="topic" value="<?php echo $topicArray[0]['TopicName']; ?>"><br>
            <select name="dropDown">
                <option value=""> - Select a section - </option>
                <?php
                $resultSection = $mysqli->query("SELECT * FROM Section");
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