<?php
include '../Controller/IndexController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <script src="../https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>ForumIT</title>
    <link rel="icon" href="../img/forum.gif" type="image/x-icon">
    <link rel='stylesheet' href="style.css">
    <meta name="description" content="Forum">
    <meta name="keywords" content="IT">
    <meta name="author" content="Minions">
    <script src="scripting.js"></script>
</head>
<body class="mainbody">
<script src="validationLogin.js"></script>
<div class="container">
    <?php require_once('../header.php'); ?>

    <div class="content">

        <div id="hiddenForm">
            <p>New section name:</p>
            <input type="text" id="newSectionName" title="inputNewSectionName">
            <br><br>
            <button id="submitNewSection" class="button1">Submit</button>
        </div>
        <table>
            <tr>
                <?php
                if ($_SESSION["roleId"] == 1) {
                    echo "<th></th><th></th>";
                } elseif ($_SESSION["roleId"] == 1 || $_SESSION["roleId"] == 2) {
                    echo "<th></th>";
                }
                ?>
                <th>Section</th>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last post</th>
            </tr>
            <?php
            foreach($sections as $section) { ?>
                <tr>
                    <td> <?php echo $section['Section']?></td>
                    <td><?php echo $section['Topics']?></td>
                    <td><?php echo $section['Posts']?></td>
                    <td><?php echo $section['LastPost']?></td>
                </tr>
            <?php } ?>

        </table>



        <?php require("footer.php"); ?>
    </div>
</body>
</html>