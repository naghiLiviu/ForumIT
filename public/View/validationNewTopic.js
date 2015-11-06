/**
 * Created by isabela on 10/9/15.
 */
function validateForm() {
    var x = document.forms["myForm"]["newTopic"].value;
    var y = document.forms["myForm"]["newComment"].value;
    if ((x == null || x == "")&& (y == null || y == "")) {
        alert("Topic Name and Comment must be filled out"); }
    else
    {
        if (x == null || x == "") {
            alert("Topic Name must be filled out");
            return false;
        }
        else {
            if (y == null || y == "") {
                alert("Comment must be filled out");
                return false;
            }
        }
    }
}
