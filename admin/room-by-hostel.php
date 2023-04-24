<?php
include '../config/db.php';
$shid = $_POST["sh_id"];
$result = mysqli_query($conn,"SELECT * FROM `room` WHERE Hostel_hid = $shid");
?>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["rid"];?>"><?php echo $row["rname"];?></option>
<?php
}
?>