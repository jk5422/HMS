<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['empemail'])) {
    header("location: ./index.php");
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $fno = $_POST['fno'];
    $acpt = $_POST['adacpt'];
    $cncl = $_POST['adcncl'];

    if ($fno != "" && $acpt!="" && $cncl!="") {
        $sql = "UPDATE `admission` SET `iscancel`='$cncl',`isaccepted`='$acpt' WHERE Form_no=$fno";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo '<div class="alert alert-success" >
        <strong>success! </strong> Admission Details is updated..!!
        </div>';
        }
    } else {
        echo '<div class="alert alert-danger" >
                <strong>Error! </strong> Please Fill Required Details..!!
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

    <link rel="stylesheet" href="../css/bootstrap513.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <link rel="stylesheet" href="./css/ststyle.css">
    <link rel="stylesheet" href="./css/stresponsive.css">
    <link rel="stylesheet" href="../css/datatable.css">
    <link rel="stylesheet" href="./css/admission.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <title>Admission | HMS</title>
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
                        <h2>Admission Details</h2>
                    </div>

                    <div class="d-flex">
                        <div class="row header" style="text-align: center;">
                            <table id="example" class="table table-striped table-bordered" style="border: 1px solid #dadada;">
                                <thead>
                                    <tr>
                                        <th>Form No</th>
                                        <th>Student Name</th>
                                        <th>Standard</th>
                                        <th>Form Date</th>
                                        <th>Hostel Name</th>
                                        <th>Admission Status</th>
                                        <th>Cancellation Status</th>
                                        <th>View Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                        </div>
                        <tbody>
                            <?php

                            $sql3 = "SELECT * FROM `admission`";
                            $res3 = mysqli_query($conn, $sql3);

                            while ($row = mysqli_fetch_assoc($res3)) {
                                $sql4 = "select * from hostel where hid=" . $row['Hostel_hid'] . ";";
                                $res4 = mysqli_query($conn, $sql4);
                                $fetch = mysqli_fetch_assoc($res4);

                                $sql6 = "select * from student where sid=" . $row['Student_sid'] . ";";
                                $res6 = mysqli_query($conn, $sql6);
                                $fetch2 = mysqli_fetch_assoc($res6);

                                $sql7 = "select * from standard where sid=" . $row['Standard_sid'] . ";";
                                $res7 = mysqli_query($conn, $sql7);
                                $fetch3 = mysqli_fetch_assoc($res7);

                                $date = date_create($row["Date"]);

                                echo '
                                        <tr>
                                        <td>' . $row["Form_no"] . '</td>
                                        <td>' . $fetch2["sname"] . '</td>
                                        <td>' . $fetch3["sname"] . '</td>
                                        <td>' . date_format($date, "d-m-Y") . '</td>
                                        <td>' . $fetch["hname"] . '</td>';

                                // admission accepted or not 
                                if ($row['isaccepted'] == '') {
                                    echo '<td class="text-primary">Pending</td>';
                                } else if ($row['isaccepted'] == '1') {
                                    echo '<td class="text-success">Accepted</td>';
                                } else {
                                    echo '<td class="text-danger">Rejected</td>';
                                }

                                // Cancellation
                                if ($row['iscancel'] == '0') {
                                    echo '<td class="text-success">Not Cancelled
                                            </td>';
                                } else {
                                    echo '<td class="text-danger">Cancel</td>';
                                }

                                echo '<td><a class="btn btn-warning" type="button" href="./admissiondetail.php?frmid=' . $row["Form_no"] . '"><i class="fas fa-eye fa-lg"></i></a></td>';

                                echo '<td><a class="btn btn-warning acceptbtn" type="button" data-bs-toggle="modal" data-bs-target="#admissionacpt"><i class="fas fa-exclamation-circle fa-lg"></i></a></td>';

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


    <!-- add employee modal -->
    <div class="modal fade" id="admissionacpt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admission Acception/Cancellation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./admission.php" method="POST">
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="fnumber">Form No </label>
                            <input type="text" name="fno" id="fnumber" class="form-control" placeholder="Form Number">
                            <!-- <input type="hidden" id="fnumber" name="fno"> -->
                        </div>


                        <div class="form-group mb-3">
                            <label for="sname">Student Name </label>
                            <input type="text" name="sname" id="sname" class="form-control">
                            <!-- <input type="hidden" name="sname" id="sname"> -->
                        </div>

                        <div class="form-group mb-3">
                            <label for="accept">Admission(Accept/Reject):-</label>
                            
                              <input type="radio" id="accept" name="adacpt" value="1" checked>
                              <label for="accept">Accept</label>
                              <input type="radio" id="reject" name="adacpt" value="0">
                              <label for="reject">Reject</label>

                        </div>

                        <div class="form-group mb-3">
                            <label for="cancel">Admission(Cancellation):-</label>
                            

                            <input type="radio" id="ncncl" name="adcncl" value="0" checked>
                              <label for="ncncl">Not Cancelled</label>
                              <input type="radio" id="cncl" name="adcncl" value="1">
                              <label for="cncl">Cancel</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
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

    $('.acceptbtn').on('click', function() {

        // $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        // alert(data[0]);

        $('#fnumber').val(data[0]);
        $('#sname').val(data[1]);


    });
</script>

</html>