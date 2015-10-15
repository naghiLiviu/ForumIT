<?php
$userId = $_SESSION["userId"];
$sqlResultUser = "SELECT * FROM User
      JOIN Role ON Role.RoleId = User.RoleId
      JOIN ContactDetail ON ContactDetail.UserId = User.UserId
      WHERE User.UserId='$userId'";
$resultUser = $mysqli->query($sqlResultUser);
$userArray = array();
foreach ($resultUser as $userKey => $userValue) {
    $userArray[] = $userValue;
}
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