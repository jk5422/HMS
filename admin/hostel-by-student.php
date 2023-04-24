<?php
include '../config/db.php';
$shid = $_POST["sh_id"];
$result = mysqli_query($conn,"SELECT * FROM `admission` WHERE Hostel_hid = $shid");
?>
<?php
while($row = mysqli_fetch_assoc($result)) {

    $stid=$row['Student_sid'];

    $sql ="SELECT * FROM `student` WHERE student.sid=$stid";
    $res=mysqli_query($conn,$sql);
    $fetch=mysqli_fetch_assoc($res);
?>
<option value="<?php echo $fetch["sid"];?>"><?php echo $fetch["sname"];?></option>
<?php
}
?>