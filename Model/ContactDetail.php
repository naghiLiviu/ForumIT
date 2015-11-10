<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 10/24/15
 * Time: 1:40 PM
 */
namespace Model;
class ContactDetail extends AbstractModel
{
    public function selectUserProfile($userId) {
        $sqlDetail           = 'SELECT * FROM ContactDetail
                               INNER JOIN Address ON Address.ContactDetailId = ContactDetail.ContactDetailId
                               WHERE ContactDetail.UserId = "' .  $userId . '"';

        $result = $this->query($sqlDetail);
        return $result;
    }

    public function updateUserProfile($fname, $lname, $phone, $target_path, $userId) {
        $updateContactDetail = 'UPDATE ContactDetail SET FirstName = "' .  $fname . '", LastName = "' .  $lname . '",
                               PhoneNumber = "' .  $phone . '", Picture = "' .  $target_path . '"
                               WHERE ContactDetail.UserId = "' .  $userId . '"';

        $this->query($updateContactDetail);
        return $this->last_id;
    }

    public function insertUserProfile($fname, $lname, $phone, $target_path, $userId) {
        $insertContactDetail = 'INSERT INTO ContactDetail (FirstName, LastName, PhoneNumber,Picture, UserId)
                               VALUES ("' .  $fname . '", "' .  $lname . '", "' .  $phone . '", "' .  $target_path . '",
                                "' .  $userId . '")';

        $this->query($insertContactDetail);

    }
}