<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 11/19/15
 * Time: 11:57 AM
 */
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