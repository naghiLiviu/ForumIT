<?php
include ('../Controller/MemberController.php');
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
                        <a href="userProfile.php?userId=<?php echo $member['UserId']; ?>"><?php echo $member['UserName']; ?></a>
                    </td>
                    <td><?php echo $member['RoleName']; ?></td>
                    <td><?php echo $member['NumberPosts']; ?></td>
                </tr>


                <?php
                if ($_SESSION["roleId"] == Role::ADMIN || $_SESSION["roleId"] == Role::MODERATOR) {

                    echo '<td><button onclick="banFunction(' . $member['UserId'] . ')">Ban</button></td>';
                }
                if ($_SESSION["roleId"] == Role::ADMIN) {
                    echo '<td><button onclick="deleteFunction(' . $member['UserId'] . ')">Delete</button></td>';
                }
                echo "</tr>";
            }
            ?>


        <script>
            var userPostId =<?php echo $userPostId; ?>;
            function deleteFunction(userPostId) {
                if (confirm("Press a button!") == true) {
                    window.location.href =("deleteUser.php?deleteUserId=" + userPostId);
                } else {
                    window.location.href =("member.php");
                }
            }

        </script>
        <script>
            function banFunction(userPostId) {
                if (confirm("Press a button!") == true) {
                    window.location.href =("banUser.php?banUserId=" + userPostId);
                } else {
                    window.location.href =("member.php");
                }
            }

        </script>

    </div>
    <?php require('footer.php'); ?>
</div>
</body>
