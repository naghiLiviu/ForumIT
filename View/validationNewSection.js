/**
 * Created by isabela on 10/9/15.
 */
function validateForm() {
    var x = document.forms["myForm"]["newSection"].value;

    if (x == null || x == "") {
        alert("Section Name  must be filled out");
    }
}