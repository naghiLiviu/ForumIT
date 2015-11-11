<?php
include ('../Controller/MemberController.php');
use Model\Role;
?>
<body class="mainbody">
<div class="container">
    <?php require('header.php');
    ?>
    <div class="content">
        <table>
            <tr>
                <th>USER</th>
                <th>RANK</th>
                <th>POSTS</th>
            </tr>
            <?php
            foreach($members as $member) {
                ?>
                <tr>
                    <td>
                        <a href="userprofile.php?userId=<?php echo $member['UserId']; ?>"><?php echo $member['UserName']; ?></a>
                    </td>
                    <td><?php echo $member['RoleName']; ?></td>
                    <td><?php echo $member['NumberPosts']; ?></td>


                <?php
                if ($_SESSION["roleId"] == Role::ADMIN || $_SESSION["roleId"] == Role::MODERATOR) {

                    echo '<td><button onclick="banFunction(' . $member['UserId'] . ')">Ban</button></td>';
                }
                if ($_SESSION["roleId"] == Role::ADMIN) {
                    echo '<td><button onclick="deleteFunction(' . $member['UserId'] . ')">Delete</button></td>';
                    echo '</tr>';
                }
                echo "</tr>";
            }
            ?>
    </table>
        <script>
            var userId =<?php echo $member['UserId']; ?>;
            function deleteFunction(userId) {
                if (confirm("Are you sure you want to deWlete this user?") == true) {
                    window.location.href =("../Controller/deleteUser.php?deleteUserId=" + userId);
                } else {
                    window.location.href =("member.php");
                }
            }

        </script>
        <script>
            function banFunction(userId) {
                if (confirm("Are you sure you want to ban this user?") == true) {
                    window.location.href =("../Controller/BanUserController.php?banUserId=" + userId);
                } else {
                    window.location.href =("member.php");
                }
            }

        </script>

    </div>
    <?php require('footer.php'); ?>
</div>
</body>
