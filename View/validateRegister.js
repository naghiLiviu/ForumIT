/**
 * Created by slobodan on 10/6/15.
 */

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validatePassword(password) {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    return re.test(password);
}

function validateUserName(userName) {
    var re = /^[a-zA-Z0-9]{3,15}$/;
    return re.test(userName);
}

function validateForm() {
    //alert('aici');
    if
    (
        !empty(document.forms["register_form"]["username"].value) &&
        !empty(document.forms["register_form"]["email"].value) &&
        !empty(emailConf = document.forms["register_form"]["emailConfirm"].value)
    ) {
        var userName = document.forms["register_form"]["username"].value;
        var email = document.forms["register_form"]["email"].value;
        var emailConf = document.forms["register_form"]["emailConfirm"].value;
        var antispam = document.forms["register_form"]["antispam"].value;
        var validatedEmail = validateEmail(email);
        var validatedUserName = validateUserName(userName);


        if (userName == null || userName == "") {
            alert("Username must be filled out!");
            return false;
        }
        if (!validatedUserName) {
            alert("Username must have at least 3 characters, maximum 15, letters or numbers!");
            return false;
        }
        if (email == null || email == "") {
            alert("E-mail must be filled out!");
            return false;
        }
        if (!validatedEmail) {
            alert("Invalid e-mail format!");
            return false;
        }
        if (email != emailConf) {
            alert("E-mail doesn't match!");
            return false;
        }
        if (antispam == null || antispam == "") {
            alert("Antispam not filled out!");
            return false;
        }
        if (antispam != 6) {
            alert("Antispam is not that value!");
            return false;
        }
    }
    var password = document.forms["register_form"]["password"].value;
    var passwordConf = document.forms["register_form"]["passwordconf"].value;
    var validatedPassword = validatePassword(password);


    if (password == null || password == "") {
        alert("Password not fiiled out!");
        return false;
    }
    if (!validatedPassword) {
        alert("Password should contain at least 8 characters, 1 number, 1 lowercase and 1 uppercase!");
        return false;
    }
    if (password != passwordConf) {
        alert("Password doesn't match!");
        return false;
    }

}