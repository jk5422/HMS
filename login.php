<?php
session_start();
$_SESSION['wmsg'] = false;
include './config/db.php';

if (isset($_SESSION['signup']) && $_SESSION['signup']==true) {
    echo '<div class="alert alert-success">
                <strong>Success! </strong> Registration Successfull..!!
                </div>';
    unset($_SESSION['signup']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username != "" && $password != "") {
        $sql = "SELECT * FROM student where smobile=$username";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['spassword'])) {
                    $_SESSION['smobile'] = $username;
                    $_SESSION['sid'] = $row['sid'];
                    $_SESSION['sname']=$row['sname'];
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
    <title>Login | HMS</title>
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
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container bg-white p-0">



        <?php include './partial/nav.php'; ?>

        <section class="py-5" style="background-color: #508bfc;">
            <div class="container py-2">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-3">Sign in</h3>
                                <form action="./login.php" method="post">
                                    <div class="form-outline mb-4">
                                        <input type="tel" class="form-control form-control-lg" name="username" placeholder="Enter Mobile " onkeypress="return isNumber(event)"  />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" class="form-control  form-control-lg" placeholder="Password" name="password" />

                                    </div>


                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" onclick="myFunction()" />
                                        <label class="ms-2 form-check-label" for="form1Example3"> Show password </label>
                                    </div>


                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <button class="btn btn-primary btn-lg btn-block btn-outline-dark" type="submit">Login</button>
                                        <a href="#" class="forgot mt-2">Forgot password ?</a>
                                    </div>

                                </form>

                                <hr class="">
                                <a href="./register.php"> New user? Signup </a>

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
<!-- main page js -->
<script src="js/main.js"></script>
<script>
    $(".alert").fadeTo(2000, 500).fadeOut(500, function() {
        $(".alert").fadeOut(500);
    });

    function myFunction() {
        var y = document.getElementById("password");


        if (y.type === "password") {

            y.type = "text";
        } else {

            y.type = "password";
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