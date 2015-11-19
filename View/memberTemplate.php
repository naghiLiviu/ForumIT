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
                        <a href="index.php?Controller=Controller\UserController&Action=userProfileAction&Template=userProfile&userId=<?php echo $member['UserId']; ?>"><?php echo $member['UserName']; ?></a>
                    </td>
                    <td><?php echo $member['RoleName']; ?></td>
                    <td><?php echo $member['NumberPosts']; ?></td>


                <?php
                if ($_SESSION["roleId"] == Model\Role::ADMIN || $_SESSION["roleId"] == Model\Role::MODERATOR) {

                    echo '<td><button onclick="banFunction(' . $member['UserId'] . ')">Ban</button></td>';
                }
                if ($_SESSION["roleId"] == Model\Role::ADMIN) {
                    echo '<td><button onclick="deleteFunction(' . $member['UserId'] . ')">Delete</button></td>';
                    echo '</tr>';
                }
                echo "</tr>";
            }
            ?>
    </table>
        <script src="deleteUser.js"></script>
        <script src="banUser.js"></script>