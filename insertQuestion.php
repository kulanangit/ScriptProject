<!DOCTYPE html>
<html>
<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");

date_default_timezone_set("Asia/Bangkok"); //set time zone
$date = date("Y-m-d H:i:s", time());

	$sql = "INSERT INTO webboard(CreateDate,Question,Details,Name) VALUES('".$date."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_POST["txtName"]."')";
	$rs = mysqli_query($conn,$sql);
	
	if($rs){
		echo "Insertion Successfully!!"; 
	}else{
		echo mysqli_error($conn);
	}
	mysqli_close($conn); 
?>
<br><a href="Webboard.php">Go to main page</a>
</html>

