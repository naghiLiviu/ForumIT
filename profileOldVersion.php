<?php
require('common.php');
$userId = $_SESSION['userId'];


$target_path = "/var/www/forumit/uploads/";


$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
//var_dump($target_path);
//die('dfgh');
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)){
    $_SESSION['message'] = "The File" . basename($_FILES['uploadedfile']['name']) . "has been uploaded";
} else {
    $_SESSION['message'] = "There was an error uploading the file, please try again";
}


$sql = "SELECT * FROM ContactDetail
INNER JOIN Address ON ContactDetail.ContactDetailId = Address.ContactDetailId
WHERE ContactDetail.UserId = '$userId'";
$sqlemail = "SELECT * FROM User WHERE User.UserId = '$userId'";
$resulEmail = $mysqli->query($sqlemail);
foreach ($resulEmail as $emailKey => $emailValue) {
    $myEmail[] = $emailValue;
}
$result = $mysqli->query($sql);
$myArray = array();
foreach ($result as $key => $value) {
    $myArray[] = $value;
}
if ($_POST) {
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['country']) && !empty($_POST['city'])
        && !empty($_POST['streetName']) && !empty($_POST['streetNumber']) && !empty($_POST['phoneNumber']) && !empty($_POST['email'])
        && !empty($_POST['password']) && !empty($_POST['passwordconf']) && !empty($_POST['antispam'])
    ) {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $streetName = $_POST['streetName'];
        $streetNumber = $_POST['streetNumber'];
        $phone = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $passconf = md5($_POST['passwordconf']);
        $spam = $_POST['antispam'];
        $mysqli->autocommit(false);
        if ($result->num_rows) {
            if ($pass == $passconf && $spam == '6') {
                $sqlVerify = "SELECT Password FROM User WHERE Password = '$pass'";
                $resultSqlVerify = $mysqli->query($sqlVerify);
                if ($resultSqlVerify->num_rows) {
                    $mysqli->query("UPDATE ContactDetail SET FirstName ='$fname', LastName = '$lname', PhoneNumber = '$phone', Picture = '$target_path'
                  WHERE ContactDetail.UserId = '$userId'");
                    $lastContactDetailId = $mysqli->insert_id;
                    $mysqli->query("UPDATE Address SET Country = '$country', City = '$city', StreetName = '$streetName', StreetNumber = '$streetNumber'
                  WHERE Address.ContactDetailId = $lastContactDetailId ");
                    $mysqli->query("UPDATE User SET Email = '$email'
                  WHERE User.UserId = '$userId'");
                    $_SESSION['message'] = "Update succesfull";
                } else {
                    $_SESSION['message'] = "Wrong Password";
                }

            } else {
                $_SESSION['message'] = "Password do not match";
            }
            if (!$mysqli->commit()) {
                $mysqli->rollback();
            }
        } else {
            if ($pass == $passconf && $spam == '6') {
                $sqlVerify = "SELECT Password FROM User WHERE Password = '$pass'";
                $resultSqlVerify = $mysqli->query($sqlVerify);
                if ($resultSqlVerify->num_rows) {
                    $mysqli->query("INSERT INTO ContactDetail (FirstName, LastName, PhoneNumber,Picture, UserId) VALUES ('$fname', '$lname', '$phone', $target_path, '$userId') ");
                    $lastContactDetailId = $mysqli->insert_id;
                    $mysqli->query("INSERT INTO Address (Country, City, StreetName, StreetNumber, ContactDetailId)
VALUES ('$country', '$city', '$streetName', '$streetNumber', $lastContactDetailId)");
                    $_SESSION['message'] = "Update succesfull";
                } else {
                    $_SESSION['message'] = "Wrong Password";
                }

            } else {
                $_SESSION['message'] = "Password do not match";
            }
            if (!$mysqli->commit()) {
                $mysqli->rollback();
            }

        }
        $mysqli->close();
    } else {
        $_SESSION['message'] = "Please fill in all the fields";
    }
}

?>
<body class="mainbody">
<div class="container">
    <?php require_once('header.php'); ?>
    <div class="regform">
        <h2>User Profile Page</h2>

        <form action="profile.php" method="post" enctype="multipart/form-data">
            <dl>

                <hr>
            </dl>
            <dl>
                <dt>
                    <label for="FirstName">First Name: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="firstName" title="First Name"
                           value="<?php echo $myArray[0]['FirstName']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="LastName">Last Name: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="lastName" title="Last Name" value="<?php echo $myArray[0]['LastName']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="Country">Country: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="country" title="Country" value="<?php echo $myArray[0]['Country']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="City">City: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="city" title="City" value="<?php echo $myArray[0]['City']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="StreetName">Street Name: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="streetName" title="Street Name"
                           value="<?php echo $myArray[0]['StreetName']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="StreetNumber">Street Number: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="streetNumber" title="Street Number"
                           value="<?php echo $myArray[0]['StreetNumber']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="PhoneNumber">Phone Number: </label>
                </dt>
                <dd>
                    <input type="number" name="phoneNumber" title="Phone Number"
                           value="<?php echo $myArray[0]['PhoneNumber']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="email"> E-mail: </label>
                </dt>
                <dd>
                    <input type="text" name="email" title="Email" value="<?php echo $myEmail[0]['Email']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="photo">  Choose a file to upload: </label>
                </dt>
                <dd>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />

                    <input name="uploadedfile" type="file" >
                </dd>
            </dl>
            <dl>
                <hr>
                <dd>
                    <p class="restriction">Please type your password for saving your data</p>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="password">Passsword:</label>
                </dt>
                <dd>
                    <input type="password" name="password" title="Password">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="passwordConfirm">Password Confirm:</label>
                </dt>
                <dd>
                    <input type="password" name="passwordconf" title="Password Confirm">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="antispam"> Antispam </label><br>
                <p class="restriction">2+2*2 = </p>
                <dd>
                    <input type="number" name="antispam" title="Anti Spam">
                </dd>
            </dl>
            <a href="changepass.php" class="button1">Change Password</a>

            <div class="buttons">
                <a href="register.php">
                    <button class="button1">Reset</button>
                </a>
                <input type="submit" value="Submit" name="submit" class="button1">
            </div>
        </form>
    </div>
    <?php require_once('footer.php'); ?>
</div>
</body>
