<?php
session_start();
include './config/db.php';
if (!isset($_SESSION['smobile'])) {
    header("location: ./login.php");
}
$sid=$_SESSION['sid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inquiries | HMS</title>
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
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/ftcustm.css">
    <link rel="stylesheet" href="./css/inquiries.css">
    <link rel="stylesheet" href="./css/datatable.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>



</head>

<body>
    <div class="container-xxl bg-white p-0">


        <!-- Header Start -->
        <?php include './partial/nav.php';  ?>
        <!-- Header End -->


        <div class="main">
            

            <div class="container-inq">
                <div class="title">
                    <h2 class="text-white">All Inquiries</h2>
                </div>

                <div class="d-flex">
                    <div class="row header" style="text-align: center;">
                        <table id="example" class="table table-striped table-bordered" style="border: 1px solid #dadada;">
                            <thead>
                                <tr>
                                    <th>Student Id</th>
                                    <th>Student Name</th>
                                    <th>Student Standard</th>
                                    <th>Form No</th>
                                    <th>Form Fill Date</th>
                                    <th>Admission Status</th>
                                    <th>Cancellation Status</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                    </div>
                    <tbody>
                        <?php

                        $sql3 = "SELECT * FROM `admission` WHERE Student_sid=$sid";
                        $res3 = mysqli_query($conn, $sql3);

                        while ($row = mysqli_fetch_assoc($res3)) {
                            $sql4 = "select * from standard where sid=" . $row['Standard_sid'] . ";";
                            $res4 = mysqli_query($conn, $sql4);
                            $fetch = mysqli_fetch_assoc($res4);

                            $sql7 = "select * from student where sid=" . $row['Student_sid'] . ";";
                            $res7 = mysqli_query($conn, $sql7);
                            $fetch1 = mysqli_fetch_assoc($res7);

                            $date=date_create($row["Date"]);

                            echo '
                                        <tr>
                                        <td>' . $row["Student_sid"] . '</td>
                                        <td>' . $fetch1["sname"] . '</td>
                                        <td>' . $fetch["sname"] . '</td>
                                        <td>' . $row["Form_no"] . '</td>
                                        <td>' . date_format($date,"d-m-Y") . '</td>';

                                        if($row["isaccepted"]=='0')
                                        {
                                            echo '<td>Rejected</td>';
                                        }
                                        else if($row["isaccepted"]=='1')
                                        {
                                            echo '<td>Accepted</td>';
                                        }
                                        else
                                        {
                                            echo '<td>Pending</td>';
                                        }

                                        if($row["iscancel"]=='0')
                                        {
                                            echo '<td>Not Cancelled</td>';
                                        }
                                        else if($row["iscancel"]=='1')
                                        {
                                            echo '<td>Cancelled</td>';
                                        }
                                        

                                        echo '<td><a href="./download.php?frmid='.$row["Form_no"].'"><i class="fas fa-file-download fa-lg"></i></a></td>';
                                        
                                       echo '</tr>
                                        ';
                        }
                        ?>
                    </tbody>

                    </table>
                </div>
            </div>
            <div class="empadd">
                <span><i class="fas fa-arrow-left fa-lg"></i><a href="./dashboard.php" class="ms-2" type="button">Go Back</a></span>
            </div>
        </div>




    </div>



    <!-- Footer Start -->
    <?php include './partial/footer.php'; ?>
    <!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    </div>

    <script src="./js/add.js"></script>

    <!-- JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="./js/main.js"></script>
    <script src="./js/datatable.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        // function test(item) {

        //     var id=item;

        //     $.ajax({
        //     url: "/HMS/download.php",
        //     type: "POST",
        //     data: {
        //         frm_id: id
        //     },
        //     cache: false,
        //     success: function(result) {
        //         alert("Downloaded")
        //     }
        // });
            

// }
        

    </script>


</body>

</html>