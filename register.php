<?php
session_start();
$_SESSION['signup'] = false;
include './config/db.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $mobile = $_POST['mobile'];

    if ($_POST['name'] != "" && $_POST['mobile'] != "" && $_POST['email'] != "" && $_POST['pass'] != "" && $_POST['cpass'] != "") {
        if ($pass == $cpass) {
            $sql = "SELECT * FROM student WHERE sname LIKE '$name' OR smobile=$mobile;";
            $res = mysqli_query($conn, $sql);
            $rcnt = mysqli_num_rows($res);

            if ($rcnt < 1) {

                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql1 = "INSERT INTO `student`( `sname`, `smobile`, `semail`, `spassword`) VALUES ('$name','$mobile','$email','$hash')";
                $res1 = mysqli_query($conn, $sql1);

                if ($res1) {
                    $_SESSION['signup'] = true;
                    header("location: ./login.php");
                }
            } else {
                echo '<div class="alert alert-danger" >
                <strong>Error! </strong> User Is already exist..!!
                </div>';
            }
        } else {
            echo '<div class="alert alert-danger">
                    <strong>Error! </strong> Password and confirm password is mismatch..!!
                    </div>';
        }
    } else {

        echo '<div class="alert alert-warning">
        <strong>Error! </strong> Please fill all required filed..!!
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
    <title>Register | HMS</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/ftcustm.css">
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="./css/sweetalert.css">
</head>

<body>
    <div class="container bg-white p-0">



        <?php include './partial/nav.php'; ?>

        <section class="py-5 " style="background-color: #508bfc;">
            <div class="container py-2">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong">
                            <div class="card-body  p-5 text-center">

                                <h3 class="mb-3">Sign Up</h3>
                                <form action="./register.php" method="post">
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control form-control-lg" name="name" placeholder="Enter Full Name" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="tel" name="mobile" onkeypress="return isNumber(event)" maxlength="10" class="form-control form-control-lg" placeholder="Mobile no" required />
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input type="password" name="pass" id="password" class="form-control form-control-lg" placeholder="Password" required />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="cpass" id="cpassword" onblur="passcheck()" class="form-control form-control-lg" placeholder="Confirm Password" required />

                                    </div>


                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" onclick="myFunction()" />
                                        <label class="ms-2 form-check-label" for="form1Example3"> Show password </label>
                                    </div>


                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <button class="btn btn-primary btn-lg btn-block btn-outline-dark" type="submit">Register</button>

                                    </div>

                                </form>

                                <hr>
                                <a href="./login.php"> Already an account? Signin </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include './partial/footer.php'; ?>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


<script src="./js/main.js"></script>
<script src="./js/sweetalert.js"></script>
<script>
    $(".alert").fadeTo(2000, 500).fadeOut(500, function() {
        $(".alert").fadeOut(500);
    });

    function myFunction() {
        var y = document.getElementById("password");
        var z = document.getElementById("cpassword");

        if (y.type === "password" && z.type === "password") {

            y.type = "text";
            z.type = "text";

        } else {

            y.type = "password";
            z.type = "password";

        }
    }

    function passcheck() {
        var p = document.getElementById("password").value;
        var q = document.getElementById("cpassword").value;
        if (p != q) {
            Swal.fire({
                icon: 'error',
                title: '!...Error...!',
                text: 'password and confirm password value mismatch..!',
            })
        }
        else
        {
            return;
        }
    }

    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>

</html>