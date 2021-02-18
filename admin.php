<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['role'] != "1")
	{
		echo "You don't have permission to access this content!";
		exit();
	}	
	
    $conn=mysqli_connect("localhost", "root", "","helloboard_db");
    $conn->query("SET NAMES UTF8");
	$sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
    $result = mysqli_query($conn,$sql);
	$fetch = mysqli_fetch_array($result);

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <header>
        
            <center>
            <h3> header </h3>
            </center>
    </header>
  <a href="logout.php">Logout</a>
</body>
</html>