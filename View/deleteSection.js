/**
 * Created by slobodan on 10/27/15.
 */
function deleteFunction(id) {
    if (confirm("Are you sure you want to delete this section?") == true) {
        window.location.href =("deleteSection?sectionId=" + sectionId);
    } else {
        window.location.href =("index.php");
    }
}