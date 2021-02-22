<html>
<header>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <div class="header">
        <h1>SUT WEBBOARD</h1>
        <p><b>---My Post---</b></p>
    </div>
</header>
<body>
<form action="delete_mypost.php" method="GET">
<div>
<?php session_start() ?>
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "helloboard_db");
$output = '';
if(isset($_POST["query"])){
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM webboard WHERE  Name = '".$_SESSION['username']."' ";
}
else{
    $query = "SELECT * FROM webboard WHERE  Name = '".$_SESSION['username']."' ";
}

$result = $connect->query($query);

if(mysqli_num_rows($result) > 0){
 $output .= '
  <div class="table-responsive" align="center">
   <table>
    <tr>
     <th>QuestionID</th>
     <th>Question</th>
     <th>Name</th>
     <th>CreateDate</th>
     <th>View</th>
     <th>Reply</th>
     <th>Topic</th>
     <th></th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result)){
  $output .= '
   <tr>
    <td>'.$row["QuestionID"].'</td>
    <td><a href="ViewWebboard.php?QuestionID='.$row["QuestionID"].'">'.$row["Question"].'</a></td>
    <td>'.$row["Name"].'</td>
    <td>'.$row["CreateDate"].'</td>
    <td>'.$row["View"].'</td>
    <td>'.$row["Reply"].'</td>
    <td >'.$row["Category"].'</td>
    <td ><a href="delete_mypost.php?QuestionID='.$row["QuestionID"].'">Delete</a></td>
   </tr>
  ';
 }
 echo $output;
}
else{
    $output .= '
  <div class="table-responsive" align="center">
   <table>
    <tr>
     <th>QuestionID</th>
     <th>Question</th>
     <th>Name</th>
     <th>CreateDate</th>
     <th>View</th>
     <th>Reply</th>
     <th>Topic</th>
     <th></th>
    </tr>
    <tr>
        <center><p>You never post anything on webboard!<p>
    </tr>
   </div>
 ';
 echo $output;
}
?><!-- <div id="result"></div> -->
  
</body> 
</html