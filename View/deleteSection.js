/**
 * Created by slobodan on 10/27/15.
 */
function deleteFunction(sectionId) {
    if (confirm("Are you sure you want to delete this section?") == true) {
        window.location.href =("index.php?Controller=Controller\\IndexController&Action=deleteAction&sectionId=" + sectionId);
    } else {
        window.location.href =("index.php?Controller=Controller\\IndexController&Action=indexAction&Template=index");
    }
}