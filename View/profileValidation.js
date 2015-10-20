function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function lettersOnly(param){
    var letters = /^[a-zA-Z\s]*$/;
    return letters.test(param);
}
function onlyNumbers(num){
    var numbers = /^[0-9]*$/;
    return numbers.test(num);
}
function profileForm2() {
    var fname = document.forms["profileForm"]["firstName"].value;
    var lname = document.forms["profileForm"]["lastName"].value;
    var country = document.forms["profileForm"]["country"].value;
    var city = document.forms["profileForm"]["city"].value;
    var streetName = document.forms["profileForm"]["streetName"].value;
    var streetNumber = document.forms["profileForm"]["streetNumber"].value;
    var phoneNumber = document.forms["profileForm"]["phoneNumber"].value;
    var email = document.forms["profileForm"]["email"].value;
    var pass = document.forms["profileForm"]["password"].value;
    var passconf = document.forms["profileForm"]["passwordconf"].value;
    var antispam = document.forms["profileForm"]["antispam"].value;
    var validatedEmail = validateEmail(email);

    if (fname == null || fname == "") {
        alert("First Name must be filled in");
        return false;
    } else {
        if(!lettersOnly(fname)){
            alert ("Only letters and spaces allowed in first name");
            return false;
        }
        if(fname.length < 2){
            alert("First name too short");
            return false;
        }
    }
    if (lname == null || lname == "") {
        alert("Last Name must be filled");
        return false;
    } else {
        if(!lettersOnly(lname)){
            alert ("Only letters and spaces allowed in last name");
            return false;
        }
        if(lname.length < 2){
            alert("Last name too short");
            return false;
        }
    }
    if (country == null || country == "") {
        alert("Country name must be filled in");
        return false;
    } else {
        if(!lettersOnly(country)){
            alert ("Only letters and spaces allowedin country name");
            return false;
        }
        if(country.length < 2){
            alert("Country name too short");
            return false;
        }
    }
    if (city == null || city == "") {
        alert("City name must be filled in");
        return false;
    } else {
        if(!lettersOnly(city)){
            alert ("Only letters and spaces allowed in city name");
            return false;
        }
        if(city.length < 2){
            alert("City name too short");
            return false;
        }
    }
    if (streetNumber == null || streetNumber == "") {
        alert("Street Number must be filled in");
        return false;
    }

    if (streetName == null || streetName == "") {
        alert("Street Name must be filled");
        return false;
    } else {
        if(!lettersOnly(streetName)){
            alert ("Only letters and spaces allowed in street name");
            return false;
        }
        if(streetName.length < 2){
            alert("Street name too short");
            return false;
        }
    }
    if (phoneNumber == null || phoneNumber == "") {
        alert("Phone Number must be filled in");
        return false;
    } else {
        if(phoneNumber.length != 10){
            alert("Phone number must have 10 numbers");
            return false;
        }
        if(!onlyNumbers(phoneNumber)){
            alert("Please insert only numbers in phone number field");
            return false;
        }
    }
    if (!validatedEmail) {
        alert("Invalid email format");
        return false;
    }
    if (email == null || email == "") {
        alert("Email must be filled in");
        return false;
    }
    if (pass == null || pass == "") {
        alert("Password must be filled in");
        return false;
    }
    if (passconf == null || passconf == "") {
        alert("Password Confirm must be filled in");
        return false;
    }
    if (pass != passconf) {
        alert("Passwords do not match");
        return false;
    }
    if (antispam == null || antispam == "" || antispam != 6) {
        alert("Antispam must be filled in or value incorrect");
        return false;
    }
}