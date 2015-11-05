function validatePassword(newpass) {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    return re.test(newpass);
}

function validateChangePassword(){

    var oldpassword = document.forms["PasswordChange"]["OldPassword"].value;
    var newpass = document.forms["PasswordChange"]["NewPassword"].value;
    var validatedPassword = validatePassword(newpass);
    var passwordConfirm = document.forms["PasswordChange"]["PasswordConfirm"].value;
    if (oldpassword == null || oldpassword == "") {
        alert("Password not fiiled out!");
        return false;
    }
    if (!validatedPassword) {
        alert("Password should contain at least 8 characters, 1 number, 1 lowercase and 1 uppercase!");
        return false;
    }
    if (newpass != passwordConfirm) {
        alert("Password doesn't match!");
        return false;
    }


}

