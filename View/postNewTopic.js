/**
 * Created by slobodan on 10/26/15.
 */
$(document).ready(function () {
    $("#submitNewTopic").click(function () {
        var newTopicComment = document.getElementById("newTopicComment").value;
        var newTopicName = document.getElementById("newTopicName").value;
        $.ajax({
            method: "POST",
            url: 'index.php?Controller=Controller\\TopicController&Action=addAction&Template=topic',
            data: {
                newTopicName: newTopicName,
                newTopicComment: newTopicComment,
                userId: userId,
                sectionId: sectionId
            },
            complete: function () {
                location.reload();
            }
        });
    });
});