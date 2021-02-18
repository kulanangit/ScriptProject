<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
 
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
// sql to delete a record
$sql = "DELETE FROM post WHERE post_id ='".$_GET['post_id']."'";

if ($conn->query($sql) === TRUE) {
  echo "<script 'text/JavaScript'>";
  echo "alert('Post ID:".$_GET['post_id']." has been deleted!!');";
  echo "</script>";
  echo "<meta http-equiv='refresh' content='0; URL=admin.php'>";
} else {
    echo "<script 'text/JavaScript'>";
    echo "alert('Post ID: Error deleting record: " . $conn->error;
    echo "</script>";
    echo "<meta http-equiv='refresh' content='0; URL=admin.php'>";
}

$conn->close();
}
?>