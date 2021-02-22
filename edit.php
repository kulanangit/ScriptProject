<?php
session_start();
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
$sql="SELECT * FROM user WHERE username = '".$_POST["username"]."' ";
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$pw = md5($_POST['password']);
// sql to delete a record

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
//echo $row["user_id"];
$sql = "UPDATE user SET username='".$_POST['username']."',password = '".$pw."',role = 0, image = '".$_POST['avatar']."', major = '".$row["major"]."' WHERE user_id = '".$row["user_id"]."'";
if ($conn->query($sql)) {
    echo "<script 'text/JavaScript'>";
    echo "alert('Update Successfully!!');";
		echo 'document.location.href = "webboard.php";';
    echo "</script>";
} else {
    echo "alert('Error Insert record: ' . $conn->error);";
    echo "Error Insert record: " . $conn->error;
};
}
$conn->close();
?>
<html>
<br><br>
<a href="Webboard.php">Go to Home</a>
</html>