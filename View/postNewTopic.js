/**
 * Created by slobodan on 10/26/15.
 */
$(document).ready(function () {
    $("#submitNewTopic").click(function () {
        var newTopicComment = document.getElementById("newTopicComment").value;
        var newTopicName = document.getElementById("newTopicName").value;
        $.ajax({
            method: "POST",
            url: "newTopicAjax.php",
            data: {
                newTopicName: newTopicName,
                newTopicComment: newTopicComment,
                userId: userId,
                sectionId: sectionId
            },
            success: function () {
                location.reload();
            }
        });
    });
});