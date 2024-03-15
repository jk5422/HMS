<?php
session_start();
$_SESSION["cpass"]= false;
include './config/db.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $cpass=$_POST["cpassword"];

    if ($mobile != "" && $password != "" && $cpass!="") 
    {
        $sql = "SELECT * FROM student where smobile=$mobile";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {

            if($password!=$cpass){
                echo '<div class="alert alert-success" >
            <strong>Error! </strong> Password and Confirm Password must be same
            </div>';
            }
            else
            {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql1="UPDATE `student` SET `spassword`='$hash' WHERE smobile LIKE '$mobile'";
                $res1=mysqli_query($conn,$sql1);

                if($res1){
                    $_SESSION['cpass']=true;
                    header("location: ./login.php");
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
    <title>Forgot Password | HMS</title>
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
    <link rel="stylesheet" href="./css/sweetalert.css">
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

                                <h3 class="mb-3">Forgot Password</h3>
                                <form action="./changepass.php" method="post">
                                    <div class="form-outline mb-4">
                                        <input type="tel" class="form-control form-control-lg" name="mobile" placeholder="Enter Mobile " onkeypress="return isNumber(event)"  />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" class="form-control  form-control-lg" placeholder="New Password" name="password" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="cpassword" class="form-control  form-control-lg" placeholder="Confirm New Password" name="cpassword" onblur="passcheck()" />

                                    </div>



                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" onclick="myFunction()" />
                                        <label class="ms-2 form-check-label" for="form1Example3"> Show password </label>
                                    </div>


                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <button class="btn btn-primary btn-lg btn-block btn-outline-dark" type="submit">Submit</button>
                                        <a href="./login.php" class="forgot mt-2">Go back to login</a>
                                    </div>

                                </form>

                            

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