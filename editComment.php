<?php require_once("Utils/Db.php");
$commentId = $_GET["commentId"];
$topicId = $_GET["topicId"];
$result = $mysqli->query("SELECT Comment FROM Comment WHERE CommentId = '$commentId'");
$commentArray = array();
foreach($result as $key => $value){
    $commentArray[] = $value;
}
if (!empty ($_POST['comment'])) {
    $comm = $_POST['comment'];
    $mysqli->query("UPDATE Comment SET Comment='$comm' WHERE CommentId = '$commentId'");
    header("Location: comment.php?topicId=$topicId");
}
?>
<body class="mainbody">
<div class="container">
    <?php require_once("header.php"); ?>
    <div class="regform">
        <p> Post a comment: </p>
        <br>

        <form method="post">
            <label>
                <textarea name="comment" rows="10" cols="40"><?php echo $commentArray[0]['Comment']; ?></textarea>
            </label><br>
            <input type="submit" name="submit" value="Post a comment" class="button1">
        </form>
        <br><br>
    </div>
    <?php require_once("footer.php"); ?>
</div>
</body>
