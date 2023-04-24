<?php
session_start();
include './config/db.php';
if(!isset($_SESSION['smobile']))
{
    header("location: ./login.php");
}

// $sql="select * from student where sid=".$_SESSION['sid']." and smobile=".$_SESSION['smobile'].";";
// $res=mysqli_query($conn,$sql);
// $fetch=mysqli_fetch_assoc($res);
// $sid=$fetch['sid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | HMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/ftcustm.css">
    <link rel="stylesheet" href="./css/dashboard.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
       

        <!-- Header Start -->
      <?php include './partial/nav.php';  ?>
        <!-- Header End -->




       <!-- dash Start -->
<div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Welcome <?php echo $_SESSION['sname']; ?></h6>
                    <h1 class="mb-5">Student <span class="text-primary text-uppercase">Dashboard</span></h1>
                </div>

                <div class="row g-4"> 
                    <div class="col-lg-3 col-md-4 col-12 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="dash-item rounded" href="./admission.php">
                            <div class="dash-icon bg-transparent border rounded ">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fas fa-user-edit fa-lg"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Admission</h5>
                            <p class="text-body mb-0"></p>
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-12 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="dash-item rounded" href="./inquiries.php">
                            <div class="dash-icon bg-transparent border rounded ">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fas fa-sticky-note fa-lg"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Your inquiries</h5>
                            <p class="text-body mb-0"></p>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- dash End -->


       
         <!-- Footer Start -->
         <?php include './partial/footer.php'; ?>
        <!-- Footer End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
</body>

</html>