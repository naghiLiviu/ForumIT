<?php require("common.php"); ?>
<body class="mainbody">
<div class="container">
    <?php require("header.php");
    $_SESSION['message'] = null;
    $sectionId = $_GET["sectionId"];
    ?>
    <div class="content">
        <?php
        if ($_SESSION["roleId"] == 1 || $_SESSION["roleId"] == 2) {
            echo "<button id='newSectionButton' class=\"button1\">Post a new Section</button>";
        }
        ?>
        <div id="hiddenForm">
            <p>New section name:</p>
            <input type="text" id="newSectionName" title="inputNewSectionName">
            <br><br>
            <button id="submitNewSection" class="button1">Submit</button>
        </div>
        <table>
            <tr>
                <?php
                if ($_SESSION["roleId"] == 1) {
                    echo "<th></th><th></th>";
                } elseif ($_SESSION["roleId"] == 1 || $_SESSION["roleId"] == 2) {
                    echo "<th></th>";
                }
                ?>
                <th>Section</th>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last post</th>
            </tr>
            <?php
            $roleId = $_SESSION['roleId'];
            $sqlSection = "SELECT * FROM Section";
            $resultSection = $mysqli->query($sqlSection);
            foreach ($resultSection as $sectionKey => $sectionValue) {
                $sectionId = $sectionValue["SectionId"];
                $sqlTopic = "SELECT * FROM Topic LEFT JOIN Comment ON Comment.TopicId = Topic.TopicId
                            LEFT JOIN User ON Comment.UserId = User.UserId
                            WHERE Topic.SectionId = '$sectionId' AND Topic.TopicStatus='Active' AND Comment.CommentStatus='Active'
                            GROUP BY Topic.TopicId
                            ORDER BY Comment.CommentId DESC";
                $resultTopic = $mysqli->query($sqlTopic);
                $countTopic = $resultTopic->num_rows;
                if ($sectionValue["SectionStatus"] == "Active") {
                    if ($_SESSION["roleId"] == 1 || $_SESSION["roleId"] == 2) {
                        echo "<tr><td></a><a href=\"editSection.php?sectionId=$sectionId\">Edit</a></td>";
                    } else {
                        echo "<tr>";
                    }
                    if ($_SESSION["roleId"] == 1) {
                        echo '<td><button class="deleteButton" onclick="deleteFunction(' . $sectionId . ')">Delete</button></td>';
                    }


                    echo "<td><a href=\"topic.php?sectionId=$sectionId\">" . $sectionValue["SectionName"] . "</a></td><td>" . $countTopic . "</td><td>";
                    $countPosts = 0;
                    $topicArray = array();
                    foreach ($resultTopic as $topicKey => $topicValue) {
                        $topicId = $topicValue["TopicId"];
                        $topicArray[] = $topicValue;
                        $sqlComment = "SELECT * FROM Comment WHERE TopicId='$topicId'";
                        $resultComment = $mysqli->query($sqlComment);
                        $countComment = $resultComment->num_rows;
                        $countPosts += $countComment;
                    }
                    echo $countPosts . "</td>";
                    echo '<td>' . $topicArray[0]["UserName"] . '</td></tr>';
                }
            }
            ?>
        </table>

        <script>
            var sectionId =<?php echo $sectionId; ?>;
            function deleteFunction(sectionId) {
                if (confirm("Are you sure you want to delete this section?") == true) {
                    window.location.href = ("deleteSection.php?sectionId=" + sectionId);
                } else {
                    window.location.href = ("index.php");
                }
            }

        </script>
        <script>
            $(document).ready(function () {
                $('#hiddenForm').hide();
                $('#newSectionButton').on('click', function () {
                    $('#hiddenForm').show();
                    $("#newSectionButton").hide();
                });
                $('#submitNewSection').on('click', function () {
                    $('#hiddenForm').hide();
                })
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#submitNewSection").click(function () {
                    var newSectionName = document.getElementById("newSectionName").value;
                    $.ajax({
                        method: "POST",
                        url: "newSection.php",
                        data: {
                            newSectionName: newSectionName
                        },
                        success: function () {
                            location.reload();
                        }
                    });
                });
            });
        </script>

        <?php require("footer.php"); ?>
    </div>
</body>