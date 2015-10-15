<?php
require_once('common.php');
$sectionId = $_GET["sectionId"];
$result = $mysqli->query("SELECT SectionName FROM Section WHERE SectionId = '$sectionId '");
$sectionArray = array();
foreach($result as $key => $value){
    $sectionArray[] = $value;
}
if (!empty ($_POST['section'])) {
    $section = $_POST['section'];
    $mysqli->query("UPDATE Section SET SectionName='$section' WHERE SectionId = '$sectionId'");
    header("Location: index.php");
}

?>

<body class="mainbody">
<div class="container">
    <?php
    require('header.php');
    ?>

    <div class="regform">
            <p> Edit section name: </p>
            <br>
            <form method="post">
                <input type="text" name="section" title="Section Name"
                       value="<?php echo $sectionArray[0]['SectionName']; ?>">
                <br>
                <br>
                <input type="submit" name="submit" value="Submit" class="button1">
            </form>


        <br><br>
    </div>

    <?php require_once('footer.php'); ?>
</div>
</body>
</html>
