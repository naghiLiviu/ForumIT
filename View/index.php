<?php

include '../Controller/IndexController.php';
include '../Utils/View/Common.html';
?>
<body class="mainbody">
<script src="validationLogin.js"></script>
<div class="container">
    <?php
    include 'header.php';
    ?>

    <div class="content">
        <button id="newSection">New Section</button>
        <div id="hiddenForm">
            <p>New section name:</p>
            <input type="text" id="newSectionName" title="inputNewSectionName">
            <br><br>
            <button id="submitNewSection" class="button1">Submit</button>
        </div>
        <table>
            <tr>
                <?php
                if ($_SESSION['roleId'] == Role::ADMIN || $_SESSION['roleId'] == Role::MODERATOR) {
                    echo '<th></th>';
                }
                if ($_SESSION['userId'] == Role::ADMIN) {
                    echo '<th></th>';
                }
                ?>
                <th>Section</th>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last post</th>
            </tr>
            <?php
            foreach ($sections as $section) {
                ?>
                <tr>
                    <?php
                    if ($_SESSION['roleId'] == Role::ADMIN || $_SESSION['roleId'] == Role::MODERATOR) {
                        echo '<td>' . $section['editLink'] . '</td>';
                    }
                    if ($_SESSION['roleId'] == Role::ADMIN) {
                        echo '<td>' . $section['deleteLink'] . '</td>';
                    }
                    ?>
                    <td> <?php echo $section['Section']; ?></td>
                    <td><?php echo $section['Topics']; ?></td>
                    <td><?php echo $section['Posts']; ?></td>
                    <td><?php echo $section['LastPost']; ?></td>
                </tr>
            <?php
            } ?>

        </table>


        <?php include 'footer.php';?>
    </div>
    <script src="newSectionForm.js"></script>
    <script src="postNewSection.js"></script>
    <script>
        $(document).ready(function () {
            var userId = <?php echo $_SESSION["userId"];?>;
        });
    </script>
    <script src="deleteSection.js"></script>
</body>
</html>