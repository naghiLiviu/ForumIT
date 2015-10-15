/**
 * Created by isabela on 10/9/15.
 */
function validateForm() {
    var x = document.forms["myForm"]["username"].value;
    var y = document.forms["myForm"]["password"].value;
    if ((x == null || x == "")&& (y == null || y == "")) {
        alert("User Name and Password must be filled out"); }
        else
    {
    if (x == null || x == "") {
        alert("User Name must be filled out");
        return false;
    }
        else {

        if (y == null || y == "") {
            alert("Password must be filled out");
            return false;
        }
    }
    }
}

