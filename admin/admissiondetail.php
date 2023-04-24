<?php
session_start();
include '../config/db.php';
$fid = $_GET['frmid'];

if (!isset($_SESSION['empemail'])) {
    header("location: ./index.php");
}

$sql1 = "SELECT * FROM `admission` WHERE `admission`.`Form_no`=$fid";
$res1 = mysqli_query($conn, $sql1);
$fetch = mysqli_fetch_assoc($res1);
$stid = $fetch['Student_sid'];
$ststd = $fetch['Standard_sid'];
$hid = $fetch['Hostel_hid'];

$sql2 = "SELECT * FROM `student` WHERE `student`.`sid`=$stid";
$res2 = mysqli_query($conn, $sql2);
$fetch1 = mysqli_fetch_assoc($res2);

$sql3 = "SELECT * FROM `standard` WHERE `standard`.`sid`=$ststd";
$res3 = mysqli_query($conn, $sql3);
$fetch2 = mysqli_fetch_assoc($res3);

$sql4 = "SELECT * FROM `hostel` WHERE `hostel`.`hid`=$hid";
$res4 = mysqli_query($conn, $sql4);
$fetch3 = mysqli_fetch_assoc($res4);


$date1 = date_create($fetch['DOB']);
$date2 = date_create($fetch['Date']);

// $sql5="SELECT * FROM `img` WHERE form_no=$fid";
// $res5=mysqli_query($conn,$sql5);

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
    <link rel="stylesheet" href="./css/studentdetail.css">

    <title>Student Details | HMS</title>
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
            <div class="container">
                <h1>Hostel Management System</h1>
                <h2>Student Admission From</h2>
                <hr>
                <div class="form-wrapper">
                    <form action="">
                        <div class="d-flex">
                            <div class="row header">

                                <!-- for image zoom  -->
                                <div id="myModal" class="modal">
                                    <img class="modal-content" id="img01">
                                    <div id="caption"></div>
                                </div>

                                <table cellpadding="10">
                                    <?php
                                    $sql7 = "SELECT * FROM `img` WHERE form_no=$fid ORDER BY path LIMIT 1";
                                    $res7 = mysqli_query($conn, $sql7);
                                    $fetch7 = mysqli_fetch_assoc($res7);
                                    ?>

                                    <tr>
                                        <th colspan="3" style="text-align: center;font-weight:bolder;font-size: larger;">Student Details</th>
                                        <td colspan="1"><img id="myImg1" src="<?php echo $fetch7['path']; ?>" alt="Student img"></td>
                                    </tr>

                                    <?php
                                    echo '<tr>
                                        <th>Form No</th>
                                        <td>' . $fid . '</td>
                                        <th>Student Id</th>
                                        <td>' . $fetch1['sid'] . '</td>
                                    </tr>

                                    <tr>
                                        <th>Student Name</th>
                                        <td>' . $fetch1['sname'] . '</td>
                                        <th>Student Mobile</th>
                                        <td>' . $fetch1['smobile'] . '</td>
                                    </tr>

                                    <tr>
                                        <th>Student Email</th>
                                        <td>' . $fetch1['semail'] . '</td>
                                        <th>Student DOB</th>
                                        <td>' . date_format($date1, "d-m-Y") . '</td>
                                    </tr>

                                    <tr>
                                        <th>Standard</th>
                                        <td>' . $fetch2['sname'] . '</td>
                                        <th>Form Submission Date</th>
                                        <td>' . date_format($date2, "d-m-Y") . '</td>
                                    </tr>

                                    <tr>
                                        <th>Gender</th>
                                        <td>' . $fetch['Gender'] . '</td>
                                        <th>Address:</th>
                                        <td>' . $fetch['Saddress'] . '</td>
                                    </tr>';

                                    ?>

                                    <tr>
                                        <th colspan="4" style="text-align: center;font-weight:bolder;font-size: larger;padding-top:10px;padding-bottom:10px;">Parents Details</th>
                                    </tr>
                                    <?php
                                    echo '<tr>
                                        <th>Parents Name</th>
                                        <td>' . $fetch['Father_name'] . '</td>
                                        <th>Parents Mobile:</th>
                                        <td>' . $fetch['Father_mobile'] . '</td>
                                    </tr>';

                                    ?>

                                    <tr>
                                        <th colspan="4" style="text-align: center;font-weight:bolder;font-size: larger;padding-top:10px;padding-bottom:10px;">Hostel Details</th>
                                    </tr>
                                    <?php

                                    echo '<tr>
                                        <th>Hostel Name</th>
                                        <td>' . $fetch3['hname'] . '</td>
                                        <th>Hostel Address:</th>
                                        <td>' . $fetch3['haddress'] . '</td>
                                    </tr>
                                    <tr>
                                        <th>Hostel Mobile</th>
                                        <td>' . $fetch3['hmobile'] . '</td>
                                        <th>Hostel Email:</th>
                                        <td>' . $fetch3['hemail'] . '</td>
                                    </tr>';

                                    ?>

                                    <tr>
                                        <th colspan="4" style="text-align: center;font-weight:bolder;font-size: larger;padding-top:10px;padding-bottom:10px;">Education/Document Details</th>
                                    </tr>
                                    <?php

                                    $n=2;
                                    $sql8 = "SELECT * FROM `img` WHERE form_no=$fid ORDER BY path LIMIT 3 OFFSET 1";
                                    $res8 = mysqli_query($conn, $sql8);


                                    echo '<tr>
                                        <th colspan="1">Last School Name</th>
                                        <th colspan="1">School LC</th>
                                        <th colspan="1">Adhar Card</th>
                                        <th colspan="1">Last Acadmic Result</th>
                                       
                                    </tr>
                                    <tr>
                                    <td >' . $fetch['Last_school'] . '</td>';

                                    while ($row = mysqli_fetch_assoc($res8)) {

                                        echo '
                                            <td colspan="1"><img id="myImg'.$n.'" src="' . $row['path'] . '" alt="Document"></td>';
                                            $n+=1;
                                    }
                                   
                                    echo '</tr>';
                                    ?>
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><a type="button" class="btn btn-primary" href="./admission.php">Go Back</a></td>
                                    </tr>

                                </table>
                    </form>
                </div>

            </div>

        </div>
    </div>




</body>


<script src="../js/bootstrap513.js"></script>
<script src="../js/jquery-360.js"></script>
<script src="../js/datatable.js"></script>
<script src="./js/stscript.js"></script>
<script src="./js/imgzoom.js"></script>

</html>