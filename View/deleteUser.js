/**
 * Created by slobodan on 10/27/15.
 */
function deleteFunction(userPostId) {
    if (confirm("Are you sure you want to delete this user?") == true) {
        window.location.href =("index.php?Controller=Controller\\UserController&Action=deleteAction&deleteUserId=" + userPostId);
    } else {
        window.location.href =("index.php?Controller=Controller\\MemberController&Action=memberAction&Template=member");
    }
}