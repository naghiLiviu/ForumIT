<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/24/15
 * Time: 1:55 PM
 */

class Address extends AbstractModel
{
    public function updateUserAddress($country, $city, $streetName, $streetNumber, $userId) {
        $updateAddress       = 'UPDATE Address SET Country = "' .  $country . '", City = "' .  $city . '", StreetName = "' .  $streetName . '",
                               StreetNumber = "' .  $streetNumber . '" WHERE Address.ContactDetailId = "' .  $userId . '"';

        $this->query($updateAddress);
    }

    public function insertUserAddress($country, $city, $streetName, $streetNumber, $lastContactDetailId) {
        $insertAddress       = 'INSERT INTO Address (Country, City, StreetName, StreetNumber, ContactDetailId)
                               VALUES ("' .  $country . '", "' .  $city . '", "' .  $streetName . '", "' .  $streetNumber . '", "' .  $lastContactDetailId . '")';

        $this->query($insertAddress);
    }
}