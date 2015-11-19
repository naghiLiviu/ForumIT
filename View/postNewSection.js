/**
 * Created by slobodan on 10/27/15.
 */
$(document).ready(function () {
    $("#submitNewSection").click(function () {
        var newSectionName = document.getElementById("newSectionName").value;
        $.ajax({
            method: "POST",
            url: "index.php?Controller=Controller\\IndexController&Action=addAction",
            data: {
                newSectionName: newSectionName
            },
            success: function () {
                window.location.href =("index.php?Controller=Controller\\IndexController&Action=indexAction&Template=index");
            }
        });
    });
});