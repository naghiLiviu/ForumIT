<?php
session_start();
session_destroy();
header('Location: ../View/index.php');
exit;