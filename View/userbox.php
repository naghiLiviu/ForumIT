<?php

include '../Controller/UserBoxController.php';
?>

<span class="userProfile">
<img src="<?php echo $userArray[0]['Picture']; ?>" class='userPhoto'>
</span>
<span class="userProfile">
    <?php
    echo $userArray[0]["UserName"] . "<br>";
    echo $userArray[0]["RoleName"];
    ?>
</span>
<span class="userProfile">
    <a href="profile.php">Edit Profile</a>
</span>