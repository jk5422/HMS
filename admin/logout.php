<?php
session_start();
unset($_SESSION['empemail']);
unset($_SESSION['empname']);
unset($_SESSION['empid']);
unset($_SESSION['wmsg']);
session_destroy();

header("location: ./index.php");
?>