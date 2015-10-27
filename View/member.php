<?php
include '../Utils/sessions.php';
include ('../Controller/MemberController.php');
include '../Utils/View/Common.html';
?>
<body class="mainbody">
<div class="container">
    <?php include 'header.php';
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
//                if ($_SESSION["roleId"] == Role::ADMIN || $_SESSION["roleId"] == Role::MODERATOR) {
//
//                    echo '<td><button onclick="banFunction(' . $member['UserId'] . ')">Ban</button></td>';
//                }
//                if ($_SESSION["roleId"] == Role::ADMIN) {
//                    echo '<td><button onclick="deleteFunction(' . $member['UserId'] . ')">Delete</button></td>';
//                }
//                echo "</tr>";
            }
            ?>


        <script src="deleteUser.js"></script>
        <script src="banUser.js"></script>

    </div>
    <?php include 'footer.php'; ?>
</div>
</body>