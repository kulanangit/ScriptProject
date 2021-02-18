<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
 
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
// sql to delete a record
$sql = "DELETE FROM user WHERE user_id='".$_GET['user_id']."'";

if ($conn->query($sql) === TRUE) {
  echo "<script 'text/JavaScript'>";
  echo "alert('user ID:".$_GET['user_id']." has been deleted!!');";
  echo "</script>";
  echo "<meta http-equiv='refresh' content='0; URL=admin.php'>";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
?>
<html>
<br><br>
<a href="admin.php">Go to Admin Page</a>
</html>