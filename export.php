<?php
$mysqli = new mysqli("localhost", "root", "root", "ForumIT");
$result = $mysqli->query("SELECT User.UserName, User.Password, User.Email, User.RoleId, User.UserStatus, User.Ban, User.BanDate, ContactDetail.FirstName, ContactDetail.LastName, ContactDetail.PhoneNumber, ContactDetail.Picture, Address.StreetNumber, Address.StreetName, Address.City, Address.Country FROM User
JOIN ContactDetail ON User.UserId = ContactDetail.UserId
JOIN Address ON ContactDetail.ContactDetailId = Address.ContactDetailId
WHERE User.RoleId =2");
$array = array();
$arrayKey = array();
foreach($result as $key => $value){
    $arrayKey = array_keys($value);
    $array = array_map(function($a, $b) { return $a . ' => ' . $b; }, $arrayKey, $value);
    $exportString .= implode("|", $array) . "&&&";
}
//var_dump($exportString);