<?php
session_start();
unset($_SESSION['webID']);
unset($_SESSION['webUsername']);
unset($_SESSION['webEmail']);
unset($_SESSION['webType']);
unset($_SESSION['webPassword']);
unset($_SESSION['webStatus']);
session_destroy();
header("Location: ../login.php");
?>