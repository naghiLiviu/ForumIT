<?php
namespace View;
include '../Utils/autoload.php';
use Model\Role as Role;


//$viewFactory = new Model\ViewFactory();
//var_dump($viewFactory->create('test'));

//Parse route parameters and decide which controller to use
//include layout if necessary
//execute controller action

//var_dump($_GET);

include '../Controller/IndexController.php';
include '../Utils/View/Common.html';
?>
<body class="mainbody">
<script src="validationLogin.js"></script>
<div class="container">
    <?php
    include 'header.php';
    ?>

    <div class="content">
        <button id="newSection">New Section</button>
        <div id="hiddenForm">
            <p>New section name:</p>
            <input type="text" id="newSectionName" title="inputNewSectionName">
            <br><br>
            <button id="submitNewSection" class="button1">Submit</button>
        </div>
        <table>
            <tr>
                <?php
                if ($_SESSION['roleId'] == Role::ADMIN || $_SESSION['roleId'] == Role::MODERATOR) {
                    echo '<th></th>';
                }
                if ($_SESSION['userId'] == Role::ADMIN) {
                    echo '<th></th>';
                }
                ?>
                <th>Section</th>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last post</th>
            </tr>
            <?php
            foreach ($sections as $section) {
                ?>
                <tr>
                    <?php
                    if ($_SESSION['roleId'] == Role::ADMIN || $_SESSION['roleId'] == Role::MODERATOR) {
                        echo '<td>' . $section['editLink'] . '</td>';
                    }
                    if ($_SESSION['roleId'] == Role::ADMIN) {
                        echo '<td>' . $section['deleteLink'] . '</td>';
                    }
                    ?>
                    <!--                    <td><a href="editSection.php?sectionId=-->
                    <?php //echo $section['SectionId'];?><!-- ">Edit</a></td>-->
                    <td>
                        <a href="topic.php?sectionId=<?php echo $section['SectionId']; ?> "> <?php echo $section['Section']; ?></a>
                    </td>
                    <td><?php echo $section['Topics']; ?></td>
                    <td><?php echo $section['Posts']; ?></td>
                    <td><?php echo $section['LastPost']; ?></td>
                </tr>
                <?php
            } ?>

        </table>


        <?php include 'footer.php'; ?>
    </div>
    <script src="newSectionForm.js"></script>
    <script src="postNewSection.js"></script>
    <script>
        var sectionId =<?php echo $section['SectionId']; ?>;
    </script>
    <script src="deleteSection.js"></script>
</body>