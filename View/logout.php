<?php
namespace View;
session_start();
session_destroy();
header('Location: ../View/index.php');
exit;