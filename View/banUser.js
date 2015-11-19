/**
 * Created by slobodan on 10/27/15.
 */
function banFunction(userPostId) {
    if (confirm("Are you sure you want to ban this user?") == true) {
        window.location.href =("index.php?Controller=Controller\\UserController&Action=banAction&banUserId=" + userPostId);
    } else {
        window.location.href =("index.php?Controller=Controller\\MemberController&Action=memberAction&Template=member");
    }
}