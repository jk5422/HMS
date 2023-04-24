<?php
session_start();
unset($_SESSION['smobile']);
unset($_SESSION['sid']);
unset($_SESSION['sname']);
unset($_SESSION['wmsg']);
session_destroy();

header("location: ./index.php");
?>