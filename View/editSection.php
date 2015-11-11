<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/28/15
 * Time: 11:15 AM
 */
namespace View;

include ('../Controller/editSectionController.php');
include '../Utils/View/Common.html';
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