/**
 * Created by slobodan on 10/27/15.
 */
function banFunction(userPostId) {
    if (confirm("Press a button!") == true) {
        window.location.href =("banUser.php?banUserId=" + userPostId);
    } else {
        window.location.href =("member.php");
    }
}