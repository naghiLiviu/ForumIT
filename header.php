<div class="header">
                <span class="headerLeft">
                    <a href="index.php"><img src="img/forum.gif" class="logo"></a>
                </span>
                <span class="headerCenter">

                    <h1>Best IT forum ever!</h1>
                </span>
                <span class="headerRight">
                    <form method="get" action="search.php" id="searchform">
                        <input type="text" name="name" placeholder="Search  your topic">
                        <input type="submit" name="submit" value="Search" class = "button1">
                    </form>
                </span>
</div>
<div class="user">
                <span class="userDetail">
                    <?php
                    if (isset($_SESSION['userId']) || $_SESSION['userId'] != null) {
                        require("userbox.php");
                    }
                    ?>
                </span>
                <span class="userDetail">
                      <?php
                      if (!empty($_SESSION['message'])) {
                          echo $_SESSION['message'];
                          $_SESSION['message'] = null;
                      }
                      ?>
                </span>
                <span class="userOption">
                    <a href="index.php">Home | </a>
                    <a href="member.php">Members | </a>
                    <a href="View/faq.php">FAQ | </a>
                    <?php
                    if (!isset($_SESSION['userId']) || $_SESSION['userId'] == null) {
                        echo "Register |</a>";
                        echo "<a href=\"login.php\">Login</a>";
                    } else {
                        echo "<a href =\"logout.php\">Log out</a>";
                    }
                    ?>
                </span>
</div>