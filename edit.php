<?php
session_start();
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
$sql="SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$pw = md5($_POST['password']);
// sql to delete a record

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
//echo $_SESSION['username'];
$sql = "UPDATE user SET username='".$_SESSION['username']."',password = '".$pw."',role = 0, image = '".$_POST['avatar']."', major = '".$row["major"]."' WHERE user_id = '".$row["user_id"]."'";
if ($conn->query($sql)) {
  echo "<script 'text/JavaScript'>";
  echo "alert('Update Successfully!!');";
  echo "</script>";
  session_destroy();
  echo "<meta http-equiv='refresh' content='0;URL=login.htm'>"; //redirect page
} else {
  echo "Error Insert record: " . $conn->error;
};
}
$conn->close();
?>
<html>
<br><br>
<a href="Webboard.php">Go to Home</a>
</html>