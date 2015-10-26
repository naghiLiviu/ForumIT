/**
 * Created by slobodan on 10/26/15.
 */
function deleteFunction(id) {
    if (confirm("Are you sure you want to delete this topic?") == true) {
        window.location.href =("deleteTopic.php?topicId=" + id + "&sectionId=" + sectionId);
    } else {
        window.location.href =("topic.php?sectionId=" + sectionId);
    }
}