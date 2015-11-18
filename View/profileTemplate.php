<?php

?>
<div class="regform">
        <h2>User Profile Page</h2>
        <div class="deleteButtonDiv">
            <button class="button1" onclick="deleteFunction(<?php echo $userId; ?>)">Delete Account</button>
        </div>
        <form name = "profileForm" enctype="multipart/form-data" onsubmit="return profileForm2()" method="post">
            <dl>
                <hr>
            </dl>
            <dl>
                <dt>
                    <label for="FirstName">First Name: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="firstName" title="First Name" value="<?php echo $detailArray[0]['FirstName']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="LastName">Last Name: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="lastName" title="Last Name" value="<?php echo $detailArray[0]['LastName']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="Country">Country: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="country" title="Country" value="<?php echo $detailArray[0]['Country']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="City">City: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="city" title="City" value="<?php echo $detailArray[0]['City']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="StreetName">Street Name: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="streetName" title="Street Name"
                           value="<?php echo $detailArray[0]['StreetName']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="StreetNumber">Street Number: </label>
                    <br>
                </dt>
                <dd>
                    <input type="text" name="streetNumber" title="Street Number"
                           value="<?php echo $detailArray[0]['StreetNumber']; ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="PhoneNumber">Phone Number: </label>
                </dt>
                <dd>
                    <input type="text" name="phoneNumber" title="Phone Number"
                           value="<?php echo $detailArray[0]['PhoneNumber']; ?>">
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
            <a href="changePassword.php" class="button1">Change Password</a>

            <div class="buttons">
                <a href="register.php">
                    <button class="button1">Reset</button>
                </a>
                <input type="submit" value="Submit" name="submit1" class="button1">
            </div>
        </form>
</div>