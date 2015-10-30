/**
 * Created by slobodan on 10/27/15.
 */
function deleteFunction(userPostId) {
    if (confirm("Press a button!") == true) {
        window.location.href =("deleteUser.php?deleteUserId=" + userPostId);
    } else {
        window.location.href =("member.php");
    }
}