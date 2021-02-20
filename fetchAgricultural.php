<?php
session_start();


error_reporting(0);
ini_set('display_errors', 0); //hide error

$connect=mysqli_connect("localhost", "root", "","helloboard_db");
$connect->query("SET NAMES UTF8");
$strSQL1 = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
$result1 = mysqli_query($connect, $strSQL1);


if($_SESSION['username'] == "")
{
    echo "<center>Please Login!<br><a href='login.htm'>Login</a><center>";

} else {

//fetch.php
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT  w.QuestionID,w.CreateDate,w.Question,w.Details,w.View,w.Reply,w.Category,u.image
                FROM webboard w 
                INNER JOIN user u
                ON w.Name = u.username  
                WHERE Major = 'Agricultural' AND  Question LIKE '%".$search."%' ";
}
else
{
    $query = " SELECT  w.QuestionID,w.CreateDate,w.Question,w.Details,w.View,w.Reply,w.Category,u.image
                FROM webboard w 
                INNER JOIN user u
                ON w.Name = u.username
                WHERE Major = 'Agricultural' ORDER BY QuestionID ";
}

$result = $connect->query($query);

if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>QuestionID</th>
     <th>Question</th>
     <th>Name</th>
     <th>CreateDate</th>
     <th>View</th>
     <th>Reply</th>
     <th>Topic</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["QuestionID"].'</td>
    <td><a href="ViewWebboard.php?QuestionID='.$row["QuestionID"].'">'.$row["Question"].'</a></td>
    <td><img src='.$row["image"].' width="50"></td>
    <td>'.$row["CreateDate"].'</td>
    <td>'.$row["View"].'</td>
    <td>'.$row["Reply"].'</td>
    <td >'.$row["Category"].'</td>

   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
}

?>

