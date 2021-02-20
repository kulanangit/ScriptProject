<?php
session_start();
$date = date("Y-m-d H:i:s", time());

$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
$insertsql="INSERT INTO report (rp_id,QuestionID,date) VALUES ('','".$_POST["q_id"]."','".$date."')";
$rs=$conn->query($insertsql);
        echo "<script 'text/JavaScript'>";
        echo "alert('Report successful!');";
        echo "</script>";
        echo "<meta http-equiv='refresh' content='0;URL=".$_POST['url']."'>"; //redirect page
$conn->close();

?>