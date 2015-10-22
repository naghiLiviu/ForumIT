<?php
use Utils\Db;
$target_path = "files/";
$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
if($_POST) {
    if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
        echo "The File " . basename($_FILES['uploadedfile']['name']) . " has been uploaded";
    } else {
        echo "There was an error uploading the file, please try again";
    }
    echo "<br><br>";
    $file = fopen($target_path, "r");
    $import = file_get_contents($target_path);
    $explode = explode("&*&*&", $import);
    $insertArray = array();
    foreach($explode as $key => $value){
        $explodeOne = explode(" | $ | ", $value);
        foreach($explodeOne as $valueTwo){
            $explodeTwo = explode(":", $valueTwo);
            $insertArray[$key][$explodeTwo[0]] = $explodeTwo[1];
        }
    }
    foreach($insertArray as $row) {
        $userName = $row['UserName'];
        $password = $row['Password'];
        $email = $row['Email'];
        $roleId = $row["RoleId"];
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
        $phoneNumber = $row['PhoneNumber'];
        $streetNumber = $row['StreetNumber'];
        $streetName = $row['StreetName'];
        $city = $row['City'];
        $country = $row['Country'];
        $userStatus = $row['UserStatus'];
        $banDate = $row['BanDate'];
        $ban = $row["Ban"];
        $picture = $row["Picture"];
        if (!empty(array_filter($row))) {
            $mysqli->query("INSERT INTO User (UserName, Password, Email, RoleId, UserStatus, Ban, BanDate) VALUES ('$userName', '$password', '$email', '$roleId', '$userStatus', '$ban', '$banDate')");
            $userId = $mysqli->insert_id;
            $mysqli->query("INSERT INTO ContactDetail (UserId, FirstName, LastName, PhoneNumber, Picture) VALUES ('$userId', '$firstName', '$lastName', '$phoneNumber', '$picture')");
            $contactDetailId = $mysqli->insert_id;
            $mysqli->query("INSERT INTO Address (ContactDetailId, StreetNumber, StreetName, City, Country) VALUES ('$contactDetailId', '$streetNumber', '$streetName', '$city', '$country')");
        }
    }
}
?>
<body>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <input name="uploadedfile" type="file" >
    <input type="submit" value="Upload">
</form>
</body>
