<div class="header">
                <span class="headerLeft">
                    <img src="img/forum.gif" class="logo">
                </span>
                <span class="headerCenter">
                    <h1>Best IT forum ever!</h1>
                </span>
                <span class="headerRight">
                    <p>Aici va veni search-ul printr-un cod php!</p>
                </span>
</div>
<div class="user">
                <span class="userDetail">
                    <p>Aici vor fi detaliile despre user!</p>
                </span>
                <span class="userDetail">
                      <?php
                      if (!empty($_SESSION['message'])) {
                          echo $_SESSION['message'];
                      }
                      ?>
                </span>
                <span class="userOption">
                    <a href="index.php">Home | </a>
                    <a href="faq.php">FAQ | </a>
                    <a href="member.php">Members | </a>
                    <a href="register.php">Register | </a>
                    <a href="login.php">Login</a>
                </span>
</div>