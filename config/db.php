<?php

$server="localhost";
$user="root";
$db="hms";
$password="";

$conn=mysqli_connect($server,$user,$password,$db);

if(!$conn){
    die("Error".mysqli_connect_error($conn));
}

?>