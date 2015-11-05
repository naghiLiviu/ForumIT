/**
 * Created by slobodan on 10/27/15.
 */
$(document).ready(function () {
    $("#submitNewSection").click(function () {
        var newSectionName = document.getElementById("newSectionName").value;
        $.ajax({
            method: "POST",
            url: "../Controller/newSection.php",
            data: {
                newSectionName: newSectionName
            },
            success: function () {
                location.reload();
            }
        });
    });
});