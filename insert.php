<?php
$conn=mysqli_connect("localhost", "root", "","Student");
$conn->query("SET NAMES UTF8");
 
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// sql to delete a record
$sql = "INSERT INTO Profile (user_id, username, password, role, image, major_id) 
VALUES (null,'".$_POST['username']."','".$_POST['password']."',0,'".$_POST['img2']."','".$_POST['major']."')";
if ($conn->query($sql) === TRUE) {
  echo "Insert Successfully!!";
} else {
  echo "Error Insert record: " . $conn->error;
};

$conn->close();
?>
<html>
<br><br>
<a href="lab1.htm">Go to Home</a>
</html>
