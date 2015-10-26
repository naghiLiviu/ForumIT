<?php use Utils\Db; ?>
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
            $sqlResult = "SELECT * FROM User
                          JOIN Role
                          ON User.RoleId = Role.RoleId
                          WHERE User.UserStatus='Active'";
            $resultMember = $mysqli->query($sqlResult);
            foreach ($resultMember as $post) {
                $userPostId = $post["UserId"];

                $userPost = "SELECT * FROM Comment
                              WHERE Comment.UserId = $userPostId";
                $countPost=$mysqli->query( $userPost);
                $NoPost = $countPost->num_rows;
                echo "<tr><td><a href='../userprofile.php?userId=$userPostId'>" . $post['UserName'] . "</a></td><td>" . $post['RoleName'] . "</td><td>$NoPost</td>";
                if($_SESSION["roleId"] == 1 || $_SESSION["roleId"] == 2){

                    echo '<td><button onclick="banFunction(' . $userPostId . ')">Ban</button></td>';
                }
                if($_SESSION["roleId"] == 1){
                    echo '<td><button onclick="deleteFunction(' . $userPostId . ')">Delete</button></td>';
                }
                echo "</tr>";
            }
            ?>
        </table>
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
