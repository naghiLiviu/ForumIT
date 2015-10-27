<?php

include ('../Controller/editSectionController.php');

?>

<body class="mainbody">
<div class="container">
    <?php

    include('header.php');

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

    <?php include('footer.php'); ?>
</div>
</body>
</html>
