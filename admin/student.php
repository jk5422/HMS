<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['empemail']))
{
    header("location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap513.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <link rel="stylesheet" href="./css/ststyle.css">
    <link rel="stylesheet" href="./css/stresponsive.css">
    <link rel="stylesheet" href="../css/datatable.css">
    <link rel="stylesheet" href="./css/admission.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <title>Student | HMS</title>
</head>

<body>

    <!-- header start-->

    <?php include './header.php'; ?>
    <!-- header end -->

    <div class="main-container">
        <!-- sidebar start -->
        <?php include './sidebar.php'; ?>
        <!-- sidebar end -->

        <div class="main">
            <main>
                <div class="container">
                    <div class="title">
                        <h2>Registered Student Details</h2>
                    </div>

                    <div class="d-flex">
                        <div class="row header" style="text-align: center;">
                            <table id="example" class="table table-striped table-bordered" style="border: 1px solid #dadada;">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        
                                    </tr>
                                </thead>
                        </div>
                        <tbody>
                            <?php

                            $sql3 = "SELECT * FROM `student`";
                            $res3 = mysqli_query($conn, $sql3);

                            while ($row = mysqli_fetch_assoc($res3)) {
                                echo '
                                        <tr>
                                        <td>' . $row["sid"] . '</td>
                                        <td>' . $row["sname"] . '</td>
                                        <td>' . $row["smobile"] . '</td>
                                        <td>' . $row["semail"] . '</td>';
                                       echo '</tr>
                                        ';
                            }
                            ?>
                        </tbody>

                        </table>
                    </div>
                </div>

            </main>

        </div>
    </div>


    
   
</body>


<script src="../js/bootstrap513.js"></script>
<script src="../js/jquery-360.js"></script>
<script src="../js/datatable.js"></script>
<script src="./js/stscript.js"></script>
<script src="../js/sweetalert.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $(".alert").fadeTo(2000, 500).fadeOut(500, function() {
        $(".alert").fadeOut(500);
    });


    
</script>

</html>