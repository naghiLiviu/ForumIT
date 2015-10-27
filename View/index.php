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

        <div id="hiddenForm">
            <p>New section name:</p>
            <input type="text" id="newSectionName" title="inputNewSectionName">
            <br><br>
            <button id="submitNewSection" class="button1">Submit</button>
        </div>
        <table>
            <tr>
                <th></th>
                <th></th>
                <th>Section</th>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last post</th>
            </tr>
            <?php
            foreach ($sections as $section) {
                ?>
                <tr>
                    <td> <?php echo $section['editLink']; ?></td>
                    <td> <?php echo $section['deleteLink']; ?></td>
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
    <script>
//        var sectionId =<?php //echo $sectionId; ?>//;
//        function deleteFunction(sectionId) {
//            if (confirm("Are you sure you want to delete this section?") == true) {
//                window.location.href = ("deleteSection.php?sectionId=" + sectionId);
//            } else {
//                window.location.href = ("../View/index.php");
//            }
//        }

    </script>
</body>
</html>