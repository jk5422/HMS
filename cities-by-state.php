<?php
include './config/db.php';
$state_id = $_POST["state_id"];
$result = mysqli_query($conn,"SELECT * FROM city where State_sid = $state_id ORDER BY ctname");
?>
<option value="">Select City</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["ctid"];?>"><?php echo $row["ctname"];?></option>
<?php
}
?>