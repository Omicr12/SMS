<?php
session_start();
session_destroy();
unset($_SESSION['MOBILE']);
unset($_SESSION['USERNAME']);
header("Location:user.php");
?>