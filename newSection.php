<?php
require_once('common.php');
?>

<body class="mainbody">
<script src="validationNewSection.js">
</script>
<div class="container">
    <?php
    require('header.php');
    ?>

    <div class="regform">

        <?php
        if (isset($_SESSION['userId']) || $_SESSION['userId'] != null) {
            if (!empty ($_POST['newSection'])) {
                $newSection = $_POST['newSection'];
                $sectionId = $_GET["sectionId"];
                $mysqli->query("INSERT INTO Section (SectionName) VALUES ('$newSection')");
                $lastTopicId = $mysqli->insert_id;
                header("Location: index.php");
            }
            ?>
            <p> Post a new section: </p>
            <br>
            <form name="myForm"  onsubmit="return validateForm()"method="post" >
                    <input type="text" name="newSection">
                <br>
                <br>
                <input type="submit" name="submit" value="Post a new section" class="button1">
            </form>
            <?php
        }
        ?>
        <br><br>
    </div>

    <?php require_once('footer.php'); ?>
</div>
</body>
</html>
