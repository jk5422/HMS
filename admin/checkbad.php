<?php
include '../config/db.php';
$bid = $_POST["bad_id"];
$rid=$_POST["room_id"];
$sid=$_POST["s_id"];

$sql="SELECT * FROM `room_allocate` WHERE Room_rid=$rid AND Student_sid=$sid AND Bad_no LIKE '$bid';";
$result = mysqli_query($conn,$sql);
$cnt=mysqli_num_rows($result);

$sql2="SELECT * FROM `room_allocate` WHERE Room_rid!=$rid AND Student_sid=$sid OR Room_rid=$rid AND Student_sid=$sid AND Bad_no NOT LIKE '$bid';";
            $res2 = mysqli_query($conn, $sql2);
            $cnt2 = mysqli_num_rows($res2);

           

if($cnt >= 1){
    echo '<p class="text-danger">Bad is already allocated..!!</p>';
}
else if($cnt2 >=1)
{
    echo '<p class="text-danger">You can not allocate more then one bad to same student..!!</p>';
}
else{

    echo '<p class="text-success">Bad is available for allocation.!!</p>';
}
?>
