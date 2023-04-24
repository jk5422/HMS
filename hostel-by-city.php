<?php
include './config/db.php';
$ct_id = $_POST["ct_id"];
$sql="SELECT * FROM `hostel` WHERE City_ctid = $ct_id;";
$result = mysqli_query($conn,$sql);
?>
<option value="">Select Hostel</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["hid"];?>"><?php echo $row["hname"];?></option>
<?php
}
?>