/**
 * Created by slobodan on 10/26/15.
 */
$(document).ready(function () {
    $('#hiddenForm').hide();
    $('#newTopicButton').on('click', function () {
        $('#hiddenForm').show();
        $("#newTopicButton").hide();
    });
    $('#submitNewTopic').on('click', function () {
        $('#hiddenForm').hide();
    })
});