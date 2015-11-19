/**
 * Created by slobodan on 10/26/15.
 */
function deleteFunction(id) {
    if (confirm("Are you sure you want to delete this topic?") == true) {
        window.location.href =("index.php?Controller=Controller\\TopicController&Action=deleteAction&Template=topic&topicId=" + id + "&sectionId=" + sectionId);
    } else {
        window.location.href =("index.php?Controller=Controller\\TopicController&Action=deleteAction&Template=topic&sectionId=' . $sectionId" + sectionId);
    }
}