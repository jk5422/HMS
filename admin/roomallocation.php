<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['empemail'])) {
    header("location: ./index.php");
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $sbad = $_POST['sbad'];
    $sid = $_POST['sid'];
    $srid = $_POST['sroom'];

    if ($sbad != "" && $sid != "" && $srid != "") {

        $sql = "SELECT * FROM `room_allocate` WHERE Room_rid=$srid AND Student_sid=$sid AND Bad_no LIKE '$sbad'";
        $result = mysqli_query($conn, $sql);
        $cnt = mysqli_num_rows($result);

        if ($cnt >= 1) {
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Bad no with particular room number is already allocated..!!
            </div>';
        } else {
            $sql2="SELECT * FROM `room_allocate` WHERE Room_rid!=$srid AND Student_sid=$sid OR Room_rid=$srid AND Student_sid=$sid AND Bad_no NOT LIKE '$sbad';";
            $res2 = mysqli_query($conn, $sql2);
            $cnt2 = mysqli_num_rows($res2);

            if($cnt2 >=1){
                echo '<div class="alert alert-danger">
            <strong>Error! </strong> You can not allocate more then one bad to same student..!!
            </div>';
            }
            else
            {

                $sql3="SELECT * FROM `admission` WHERE Student_sid=$sid";
                $res3=mysqli_query($conn,$sql3);
                $fetch=mysqli_fetch_assoc($res3);

                if($fetch['isaccepted']=='1')
                {
                    $sql1="INSERT INTO `room_allocate`(`Room_rid`, `Student_sid`, `Bad_no`) VALUES ($srid,$sid,'$sbad');";
                $res1=mysqli_query($conn,$sql1);
     
                if($res1){
                 echo '<div class="alert alert-success">
                 <strong>Success! </strong> Bad no allocated..!!
                 </div>';
                }
            }
            else
            {
                echo '<div class="alert alert-warning">
        <strong>Error! </strong> Please first accept the student admission then allocate the bad no..!!
        </div>';
            }

                
            }
        }
    } else {
        echo '<div class="alert alert-warning">
        <strong>Warning! </strong> Please fill all required filed..!!
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
    <link rel="stylesheet" href="./css/roomallocate.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <title>Room Allocation | HMS</title>
</head>

<body>

    <!-- header start-->

    <?php include './header.php'; ?>
    <!-- header end -->

    <div class="main-container">
        <!-- sidebar start -->
        <?php include './sidebar.php'; ?>
        <!-- sidebar end -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="title">
                        <h2> Room Allocation</h2>
                    </div>
                </div>
            </div>


            <div class="d-flex">
                <form action="./roomallocation.php" method="POST" id="form1">
                    <label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <span>Select Hostel: <span class="required">*</span></span>
                                    <select name="shostel" id="shid" class="form-control">
                                        <option value="">---select hostel ---</option>
                                        <?php
                                        $sql1 = "select * from hostel";
                                        $res1 = mysqli_query($conn, $sql1);

                                        while ($row = mysqli_fetch_assoc($res1)) { ?>

                                            <option value="<?php echo $row['hid'] ?>"> <?php echo $row['hname'] ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="available"></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <span>Select Student: <span class="required">*</span></span>
                                    <select name="sid" id="sid" class="form-control">
                                        <option value="">---Select Student---</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <span>Select Room No: <span class="required">*</span></span>
                                    <select name="sroom" id="srname" class="form-control">
                                        <option value="">---Select Room No---</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <span>Select Bad No: <span class="required">*</span></span>
                                    <select name="sbad" id="sbad" class="form-control">
                                        <option value="">---Select Bad No---</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                        <option value="J">J</option>
                                        <option value="K">K</option>
                                        <option value="L">L</option>
                                        <option value="M">M</option>
                                        <option value="N">N</option>
                                        <option value="O">O</option>
                                        <option value="P">P</option>
                                        <option value="Q">Q</option>
                                        <option value="R">R</option>
                                        <option value="S">S</option>
                                        <option value="T">T</option>
                                        <option value="U">U</option>
                                        <option value="V">V</option>
                                        <option value="W">W</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>


                                    </select>
                                    <span id="checkavl"></span>
                                </div>
                            </div>


                        </div>
                    </label>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-12 col-12 ">
                            <input type="submit" name="btn" id="insert" value="Submit" class="btn btn-info btn-outline-dark">

                            <input type="reset" name="btn" id="cancel" value="Cancel" class="btn btn-warning btn-outline-danger">
                        </div>
                    </div>


            </div>
        </div>

    </div>
</body>


<script src="../js/bootstrap513.js"></script>
<script src="../js/jquery-360.js"></script>
<script src="../js/datatable.js"></script>
<script src="./js/stscript.js"></script>
<script src="../js/sweetalert.js"></script>
<script src="./js/rallocate.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $(".alert").fadeTo(2000, 500).fadeOut(500, function() {
        $(".alert").fadeOut(500);
    });


    function passcheck() {
        var p = document.getElementById("password").value;
        var q = document.getElementById("cpassword").value;
        if (p != q) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '!...Error...!',
                timer: 2000,
                showConfirmButton: false,
                text: 'password and confirm password value mismatch..!',
            })
        } else {
            return;
        }
    }
</script>

</html>