/**
 * Created by slobodan on 10/27/15.
 */
$(document).ready(function () {
    $('#hiddenForm').hide();
    $('#newSection').on('click', function () {
        $('#hiddenForm').show();
        $("#newSection").hide();
    });
    $('#submitNewSection').on('click', function () {
        $('#hiddenForm').hide();
        $("#newSection").show();
    })
});