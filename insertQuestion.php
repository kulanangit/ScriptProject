<!DOCTYPE html>
<html>
<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");

	$sql = "INSERT INTO webboard(CreateDate,Question,Details,Name) VALUES('".date("Y-m-d H:i:s")."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_POST["txtName"]."')";
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

