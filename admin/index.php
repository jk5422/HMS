<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username != "" && $password != "") {
        $sql = "SELECT * FROM `employee` WHERE Emp_email LIKE '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['Password'])) {
                    $_SESSION['empemail'] = $username;
                    $_SESSION['empname'] = $row['Emp_name'];
                    $_SESSION['empid']=$row['Empid '];
                    $_SESSION['wmsg'] = true;

                    header("location: ./dashboard.php");
                } else {
                    echo '<div class="alert alert-danger"  id="success-alert" >
                    <strong>Error! </strong> Invalid Credentials
                    </div>';
                    
                }
            }
        } 
        else {
            echo '<div class="alert alert-danger" >
            <strong>Error! </strong> Invalid Credentials
            </div>';
            
        }
    }
     else 
     {
        echo '<div class="alert alert-danger" >
            <strong>Error! </strong> please fill required details ..!!
            </div>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	 <!-- Icon Font Stylesheet -->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">


    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="../css/sweetalert.css">
    <title>Admin Login | HMS</title>
</head>
<body>
<div class="wrapper">
        <div class="logo">
            <img src="../logo/hms.png" alt="HMS">
        </div>
        <div class="text-center mt-4 name">
            Admin  Login
        </div>
        <form class="p-3 mt-3" method="post" action="./index.php">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="username" id="userName" placeholder="Enter Your Email" >
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd"  placeholder="Password">
            </div>
            <div class="align-items-center">
            <input class="form-check-input" type="checkbox" onclick="myFunction()" />
                                        <label class="ms-2 form-check-label" for="form1Example3"> Show password </label>
        </div>
            <button class="btn mt-3" type="submit" >Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a>
        </div>
    </div>
</body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../js/sweetalert.js"></script>
    <script>
         $(".alert").fadeTo(2000, 500).fadeOut(500, function() {
        $(".alert").fadeOut(500);
    });

    function myFunction() {
        var y = document.getElementById("pwd");


        if (y.type === "password") {

            y.type = "text";
        } else {

            y.type = "password";
        }
    }
    </script>
</html>