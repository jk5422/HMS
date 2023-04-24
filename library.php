<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Library | HMS</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
</head>

<body>
    <div class="container-xxl bg-white p-0">
        
        <!-- Header Start -->
        <?php include './partial/nav.php';  ?>
        <!-- Header End -->


         <!-- Page Header Start -->
         <div class="container-fluid page-header p-0" style="background-image: url(./poster/E-library.jpg);width:100%;">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Library</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        
        
        <!-- Video Start -->
        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Library</h6>
                        <h1 class="text-white mb-4">Nothing is pleasanter than exploring a library</h1>
                        <ol class="text-white">
                            <li>Comfortable Seating: The library can have comfortable seating arrangements such as chairs, sofas, and tables for students to study and read.</li>
                            <li>Extended Hours: Hostel libraries can have extended hours during exams and other peak study periods, to provide students with more access to study materials and resources.</li>
                            <li>Wi-Fi Access: The hostel library can provide Wi-Fi access to students, enabling them to access online resources and research materials.</li>
                            <li>Reference Material Access: The library can have a reference section that contains dictionaries, encyclopedias, and other reference materials that students can access for research and academic work.</li>
                            <li>Printing and Scanning Facilities: To make it convenient for students to print or scan documents, the library can provide printing and scanning facilities within the library.</li>
                            
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video">
                       
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/NFFW9BB3ZkI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video end -->
        
        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Explore Our </h6>
                    <h1 class="mb-5">Library <span class="text-primary text-uppercase">Facilities</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded shadow overflow-hidden ">
                            <div class="position-relative">
                                <img class="img-fluid" width="100%" height="100%" src="./poster/comp_library.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" width="100%" height="100%" src="./poster/library_pg4.jfif" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" width="100%" height="100%" src="./poster/Library_pg3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                                        
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" width="100%" height="100%" src="./poster/library_discuss.jfif" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Team End -->



         <!-- Footer Start -->
         <?php include './partial/footer.php'; ?>
        <!-- Footer End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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