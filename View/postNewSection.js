/**
 * Created by slobodan on 10/27/15.
 */
$(document).ready(function () {
    $("#submitNewSection").click(function () {
        var newSectionName = document.getElementById("newSectionName").value;
        $.ajax({
            type : "POST",
            url : "index.php?Controller=Controller\\IndexController&Action=addAction",
            data : { newSectionName: newSectionName},
            //Consider using an anonymous function here
            complete : function() {
                location.reload();
            }
        });
    });
});