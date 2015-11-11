<?php
//namespace View;

include '../Controller/EditCommentController.php';
include '../Utils/View/Common.html';

?>
<body class="mainbody">
<div class="container">
    <?php require_once("header.php"); ?>
    <div class="regform">
        <p> Post a comment: </p>
        <br>

        <form method="post">
            <label>
                <textarea name="comment" rows="10" cols="40"><?php echo $commentArray['Comment']; ?></textarea>
            </label><br>
            <input type="submit" name="submit" value="Post a comment" class="button1">
        </form>
        <br><br>
    </div>
    <?php require_once("footer.php"); ?>
</div>
</body>
